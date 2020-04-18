<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'mark_as_menu',
        'sort',
        'show_on_homepage',
        'status',
        'meta_description'
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'name'             => 'string',
        'slug'             => 'string',
        'parent_id'        => 'integer',
        'mark_as_menu'     => 'boolean',
        'sort'             => 'integer',
        'show_on_homepage' => 'boolean',
        'status'           => 'boolean',
        'meta_description' => 'string'
    ];

    /**
     * The many-to-many relationship between tags and posts.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'categories_posts_pivot');
    }
    
    /**
     * The many-to-many relationship between tags and posts.
     *
     * @return BelongsToMany
     */
    public function relatedPosts()
    {
        return $this->belongsToMany('App\Models\Post', 'categories_posts_pivot')->orderBy('published_at')->limit(4);
    }
    
    /**
     * The many-to-many relationship between categories and posts.
     *
     * @return BelongsToMany
     */
    public function homePagePosts()
    {
        return $this->belongsToMany('App\Models\Post', 'categories_posts_pivot')->where('show_in_category', true)->orderBy('posts.updated_at', 'desc');
    }

    /**
     * The one to one relationship between post and post.
     *
     * @return OneToOne
     */
    public function parentCategory()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    
    /**
     * Get Home page category posts
     */
    public static function homePageCategories()
    {
        return Category::with('homepagePosts')->where('show_on_homepage', true)->get();
    }
    
    /**
     * The one to one relationship between categories.
     *
     * @return OneToMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
    
    /**
     * The one to one relationship between categories.
     *
     * @return OneToMany
     */
    public function menuSubcategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->where('mark_as_menu', true);
    }
    
    /**
     * Get menu categories
     */
    public static function menuCategories()
    {
        return Category::with('menuSubcategories')->where('parent_id', 0)->where('mark_as_menu', true)->get();
    }


    /**
     * Get the parent categories list with Id and Name
     */
    public static function parentCategoriesList()
    {
        return Category::where('parent_id', 0)->where('status', 1)->pluck('name', 'id')->all();
    }
    
    /**
     * Get the sub categories list with Id and Name
     */
    public static function subCategoriesList()
    {
        return Category::where('parent_id', '>', 0)->where('status', 1)->pluck('name', 'id')->all();
    }
    
    /**
     * Get the sub categories list with Id and Name
     */
    public static function parentSubCategoriesList($parent_id)
    {
        return Category::where('parent_id', $parent_id)->where('status', 1)->pluck('name', 'id')->all();
    }

    /**
     * Return a tag link.
     *
     * @param string $base
     *
     * @return string
     */
    public function link($base = '/?category=%CATEGORY%')
    {
        $url = str_replace('%CATEGORY%', urlencode($this->slug), $base);
        $link = '<a href="'.$url.'">'.e($this->slug).'</a>';

        return $link;
    }
}
