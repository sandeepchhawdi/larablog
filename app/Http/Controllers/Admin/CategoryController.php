<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\CategoryFormFields;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = CategoryFormFields::formData();

        return view('admin.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $fields = CategoryFormFields::fields();
        foreach (array_keys($fields) as $field) {
            $category->$field = $request->get($field);
        }
        $category->save();

        return redirect('/admin/categories')
                ->withSuccess(trans('messages.success.category-created', ['category' => $category->name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = CategoryFormFields::formData($category);

        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param int                                 $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $fields = CategoryFormFields::fields();

        foreach (array_keys($fields) as $field) {
            $category->$field = $request->get($field);
        }

        $category->save();

        return redirect("/admin/categories/$id/edit")
                    ->withSuccess(trans('messages.success.category-updated', ['category' => $category->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\DestroyCategoryRequest $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->posts()->detach();
        $category->delete();

        return redirect()
            ->route('showcategories')
            ->withSuccess(trans('messages.success.category-deleted', ['category' => $category->category]));
    }
    
    /**
     * Function child categories list on the basis parent id
     * @param type $parent_category_id
     */
    public function getChildCategoriesList($parent_id)
    {
        return response()->json(Category::parentSubCategoriesList($parent_id));
    }
}
