<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use WeAreNeopix\LaravelModelTranslation\Translation;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        return view('admin.apps.category.browser', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        $categories = Category::whereNull('parent_id')->get();

        return view('admin.apps.category.create', ['breadcrumbs' => $breadcrumbs, 'categories' => $categories]);
    }


    public function store(CreateCategoryRequest $request)
    {

        $cat = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);

        Translation::storeTranslationsForModel($cat, 'en', [
            'name_trans' => 'Old Article Title en',
        ]);

        Translation::storeTranslationsForModel($cat, 'vi', [
            'name_trans' => 'Old Article Title vi',
        ]);


        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        return view('admin.apps.category.show', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateCategoryRequest $category)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Collapsed menu"]
        ];
        $categories = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('admin.apps.category.edit', ['breadcrumbs' => $breadcrumbs, 'category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }

    public function getList()
    {
        return response()->json(['data' => Category::with(['category'])->get()->map(function ($category) {
            $category->parent = $category->category->name ?? "";
            return $category;
        })]);
    }
}
