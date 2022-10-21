<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    protected $moduleNameFolder = 'project';
    protected $moduleName = 'Project';

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

        $categories = ProjectCategory::all();
        return view('admin.apps.' . $this->moduleNameFolder . '.create', ['breadcrumbs' => $breadcrumbs, 'categories' => $categories]);
    }

    public function store(CreatePostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Project::create([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'project_category_id' => $request->category_id,
                'image ' => null,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keywords' => $request->seo_keywords,
            ]);
            if ($post && $request->hasFile('image')) {
                $post->clearMediaCollection('image');
                $post->addMedia($request->file('image'))->toMediaCollection('image');
            }
            DB::commit();
            return redirect()->route('admin.projects.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }


    public function show(Project $project)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.show', ['breadcrumbs' => $breadcrumbs]);
    }


    public function edit(Project $project)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        $categories = ProjectCategory::all();
        return view('admin.apps.' . $this->moduleNameFolder . '.edit', ['breadcrumbs' => $breadcrumbs, 'project' => $project, 'categories' => $categories]);
    }

    public function update(Request $request, Project $project)
    {
        DB::beginTransaction();
        try {
            $project->update([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'project_category_id' => $request->category_id,
                'image ' => null,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keywords' => $request->seo_keywords,
            ]);
            if ($project && $request->hasFile('image')) {
                $project->clearMediaCollection('image');
                $project->addMedia($request->file('image'))->toMediaCollection('image');
            }
            DB::commit();
            return redirect()->route('admin.projects.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function destroy(Project $project)
    {
        return $project->delete();
    }

    public function getList()
    {
        return response()->json(['data' => Project::with(['projectCategory'])->get()->map(function ($post) {
            $post->category_name = $post->projectCategory->name;
            return $post;
        })]);
    }
}
