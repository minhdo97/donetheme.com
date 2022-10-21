<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Models\Category;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    protected $moduleNameFolder = 'projectCategory';
    protected $moduleName = 'Project Category';

    public function index()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.browser', ['breadcrumbs' => $breadcrumbs]);
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        $categories = ProjectCategory::whereNull('parent_id')->get();

        return view('admin.apps.' . $this->moduleNameFolder . '.create', ['breadcrumbs' => $breadcrumbs, 'categories' => $categories]);
    }


    public function store(CreateCategoryRequest $request)
    {
        ProjectCategory::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);
        return redirect()->route('admin.project-categories.index');
    }

    public function show(ProjectCategory $category)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.show', ['breadcrumbs' => $breadcrumbs]);
    }

    public function edit(ProjectCategory $projectCategory)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        $categories = ProjectCategory::whereNull('parent_id')->where('id', '!=', $projectCategory->id)->get();

        return view('admin.apps.' . $this->moduleNameFolder . '.edit', ['breadcrumbs' => $breadcrumbs, 'category' => $projectCategory, 'categories' => $categories]);
    }

    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $projectCategory->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);
        return redirect()->route('admin.project-categories.index');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        return $projectCategory->delete();
    }

    public function getList()
    {
        return response()->json(['data' => ProjectCategory::with(['projectCategory'])->get()->map(function ($category) {
            $category->parent = $category->projectCategory->name ?? "";
            return $category;
        })]);
    }
}
