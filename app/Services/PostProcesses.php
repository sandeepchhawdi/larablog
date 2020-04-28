<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use App\Models\Category;

class PostProcesses
{
    protected $tag;
    protected $category;
    protected $searchTerm;
    protected $postsData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tag = '', $category = '', $searchTerm = '')
    {
        $this->tag = $tag;
        $this->category = $category;
        $this->searchTerm = $searchTerm;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->category) {
            $this->postsData = $this->categoryIndexData($this->category);

            return true;
        }
        
        if ($this->tag) {
            $this->postsData = $this->tagIndexData($this->tag);

            return true;
        }
        
        if ($this->searchTerm) {
            $this->postsData = $this->searchTermIndexData($this->searchTerm);

            return true;
        }

        $this->postsData = $this->normalIndexData();

        return true;
    }

    /**
     * Gets the response.
     *
     * @return private postsData[]
     */
    public function getResponse()
    {
        return $this->postsData;
    }

    /**
     * Return data for normal index page.
     *
     * @return array
     */
    protected function normalIndexData()
    {
        $posts = Post::isNotDraft()->orderBy('id')->simplePaginate(4);
        $popular_posts = Post::where('mark_as_popular', 1)->orderBy('updated_at', 'desc')->limit(4)->get();
        $latest_posts = Post::where('mark_as_latest', 1)->orderBy('updated_at', 'desc')->limit(4)->get();
        $home_page_categories = Category::homePageCategories();
        return [
            'title'             => config('blog.title'),
            'subtitle'          => config('blog.subtitle'),
            'posts'             => $posts,
            'post_image'        => config('blog.home_page_image'),
            'meta_description'  => config('blog.description'),
            'reverse_direction' => config('blog.reverse_pagination_direction'),
            'tag'               => null,
            'popular_posts'    => $popular_posts,
            'latest_posts'     => $latest_posts,
            'home_page_categories'   => $home_page_categories
        ];
    }

    /**
     * Return data for a tag index page.
     *
     * @param string $tag
     *
     * @return array
     */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $posts = $tag->posts()
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page')); // No limit in theory

        $post_image = $tag->post_image ?: config('blog.post_image');

        return [
            'title'             => $tag->title,
            'posts'             => $posts,
            'post_image'        => $post_image,
            'slug'              => $tag->tag,
            'tag'               => $tag,
            'meta_description'  => $tag->meta_description ?: \ config('blog.description'),
        ];
    }
    
    /**
     * Return data for a category index page.
     *
     * @param string $tag
     *
     * @return array
     */
    protected function categoryIndexData($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();
        $posts = $category->posts()->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        $post_image = $category->image ?: config('blog.post_image');

        return [
            'title'             => $category->name,
            'slug'              => $category->slug,
            'posts'             => $posts,
            'post_image'        => $post_image,
            'category'          => $category,
            'meta_description'  => $category->meta_description ?: \ config('blog.description'),
        ];
    }
    
    /**
     * Return data for a category index page.
     *
     * @param string $tag
     *
     * @return array
     */
    protected function searchTermIndexData($searchTerm)
    {
        $posts = Post::where('is_draft', 0)
            ->where('title', 'like', '%'.$searchTerm.'%')
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));
        
        $posts->appends(['q' => $searchTerm]);

        $post_image = config('blog.post_image');

        return [
            'title'             => 'Search Page',
            'slug'              => 'search',
            'posts'             => $posts,
            'post_image'        => $post_image,
            'meta_description'  => config('blog.description'),
        ];
    }
}
