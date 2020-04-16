<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use App\Models\Category;

class PostFormFields
{
    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'title'             => '',
        'subtitle'          => '',
        'post_image'        => '',
        'content'           => '',
        'meta_description'  => '',
        'is_draft'          => '1',
        'author'            => '',
        'slug'              => '',
        'publish_date'      => '',
        'publish_time'      => '',
        'layout'            => 'blog.post',
        'tags'              => [],
        'parent_category_id'=> 0
    ];

    /**
     * Create a new job instance.
     *
     * @param int $id
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = $this->fieldList;

        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $fields);
            $fields['publish_time'] = $fields['publish_date']->format('g:i A');
            $fields['publish_date'] = $fields['publish_date']->format('M-d-Y');
        } else {
            $when = Carbon::now()->addHour();
            $fields['publish_date'] = $when->format('M-j-Y');
            $fields['publish_time'] = $when->format('g:i A');
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        // Get the additional data for the form fields
        $postFormFieldData = $this->postFormFieldData();

        return array_merge(
            $fields, [
                'allTags' => Tag::pluck('tag')->all(),
                'parent_categories' => Category::parentCategoriesList(),
                'sub_categories' => Category::parentSubCategoriesList($fields['parent_category_id'])
            ],
            $postFormFieldData
        );
    }

    /**
     * Return the field values from the model.
     *
     * @param int   $id
     * @param array $fields
     *
     * @return array
     */
    protected function fieldsFromModel($id, array $fields)
    {
        $page = Post::with(['tags', 'categories'])->findOrFail($id);
        $parent_category_id = 0;
        $sub_categories_ids = [];
        if (!empty($page->categories)) {
            foreach ($page->categories as $cat) {
                if ($cat->parent_id == 0) {
                    $parent_category_id = $cat->id;
                } else {
                    $sub_categories_ids[] = $cat->id;
                }
            }
        }

        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = [
            'id' => $id,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $page->{$field};
        }

        $fields['tags'] = $page->tags()->pluck('tag')->all();
        $fields['parent_category_id'] = $parent_category_id;
        $fields['sub_categories_ids'] = $sub_categories_ids;
        return $fields;
    }

    /**
     * Get the additonal post form fields data.
     *
     * @return array
     */
    protected function postFormFieldData()
    {
        $allAvailableAuthors = PostAuthors::all();
        $postTemplates = PostTemplates::list();

        return [
            'allAvailableAuthors'   => $allAvailableAuthors,
            'postTemplates'         => $postTemplates,
        ];
    }
}
