<?php

namespace App\Services;

use App\Models\Category;

class CategoryFormFields
{
    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    private static $_fieldList = [
        'name'               => '',
        'slug'             => '',
        'image'          => '',
        'parent_id'  => 0,
        'mark_as_menu'        => 0,
        'show_on_homepage'            => 0,
        'status' => 1,
        'meta_description' => ''
    ];

    /**
     * Get the tag form fields data.
     *
     * @return array
     */
    public static function fields()
    {
        return self::$_fieldList;
    }

    /**
     * Get data needed for tag forms.
     *
     * @param App/Models/Tag $tag
     *
     * @return array
     */
    public static function formData($category = null)
    {
        $data = self::fields();
        if ($category) {
            $data = $category->toArray();
        }
        $parentCategories = Category::parentCategoriesList();
        $data['parent_categories'] = $parentCategories;

        return $data;
    }
}
