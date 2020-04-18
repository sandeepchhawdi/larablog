<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['activity']], function () {

    Route::get('/category/{slug}', 'BlogController@categoryDetail')->name('category.detail');
    Route::get('/tag/{slug}', 'BlogController@tagDetail')->name('tag.detail');
    
    // Homepage Route
    Route::get('/', 'BlogController@index')->name('home');
    

    // Authors Routes
    Route::get('/authors', 'BlogController@authors')->name('authors');
    Route::get('/author/{author}', 'BlogController@author')->name('author');

    // Contact Routes
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@contactSend')->name('contactSend');
    
    Route::post('/subscribe-us', 'ContactController@subscribeUs')->name('subscribe-us');

    Route::get('/about', 'BlogController@about')->name('about');
    // Register, Login, and forget PW Routes
    Auth::routes();
});

// Super Admin only routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.super.admin', 'activity']], function () {
    //
});

// Writer and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.writer', 'activity']], function () {
    Route::resource('posts', 'Admin\PostController', [
        'names'    => [
            'create'    => 'posts.create',
            'index'     => 'admin.posts',
            'update'    => 'updatepost',
            'store'     => 'storepost',
            'edit'      => 'editpost',
            'destroy'   => 'destroypost',
        ],
        'except' => [
            'show',
        ],
        'parameters' => [
            'post' => 'id',
        ],
    ]);

    Route::resource('tags', 'Admin\TagController', [
        'names'    => [
            'create'    => 'createtag',
            'index'     => 'showtags',
            'update'    => 'updatetag',
            'store'     => 'storetag',
            'edit'      => 'edittag',
            'destroy'   => 'destroytag',
        ],
        'except' => [
            'show',
        ],
        'parameters' => [
            'tag' => 'id',
        ],
    ]);
    
    Route::resource('categories', 'Admin\CategoryController', [
        'names'    => [
            'create'    => 'createcategory',
            'index'     => 'showcategories',
            'update'    => 'updatecategory',
            'store'     => 'storecategory',
            'edit'      => 'editcategory',
            'destroy'   => 'destroycategory',
            'show'      => 'showcategory'
        ],
        'parameters' => [
            'category' => 'id',
        ],
    ]);
    
    Route::get('category/subcategories/{parent_id}', 'Admin\CategoryController@getChildCategoriesList')->name('parent-subcategories');

    Route::get('/uploads', 'Admin\AdminController@uploads')->name('admin-uploads');

    Route::resource('themes', 'Admin\ThemesManagementController', [
        'names' => [
            'index'     => 'themes',
            'create'    => 'createtheme',
            'update'    => 'updatetheme',
            'store'     => 'storetheme',
            'edit'      => 'edittheme',
            'destroy'   => 'destroytheme',
            'show'      => 'showtheme',
        ],
    ]);
    Route::post('/update-blog-theme', 'Admin\ThemesManagementController@updateDefaultTheme')->name('update-blog-theme');
});

// User and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.user', 'activity']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/sitemap', 'Admin\AdminController@sitemap')->name('sitemap-admin');
    Route::post('/generate-sitemap', 'Admin\AdminController@generateSitemap')->name('generate-sitemap');
});

Route::group(['middleware' => ['activity']], function () {
    // Dynamic Pages Routes
    Route::get('/{slug}/', 'BlogController@showPost')->name('post.detail');
});
