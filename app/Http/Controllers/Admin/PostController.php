<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $moduleNameFolder = 'post';
    protected $moduleName = 'Post';


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

        $categories = Category::all();
        return view('admin.apps.post.create', ['breadcrumbs' => $breadcrumbs, 'categories' => $categories]);
    }

    public function store(CreatePostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'category_id' => $request->category_id,
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
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function show(Post $post)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.show', ['breadcrumbs' => $breadcrumbs]);
    }


    public function edit(Post $post)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        $categories = Category::all();
        return view('admin.apps.' . $this->moduleNameFolder . '.edit', [
            'breadcrumbs' => $breadcrumbs,
            'post' => $post, 'categories' => $categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        DB::beginTransaction();
        try {
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'category_id' => $request->category_id,
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
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        return $post->delete();
    }

    public function getList()
    {
        return response()->json(['data' => Post::with(['category'])->get()->map(function ($post) {
            $post->category_name = $post->category->name;
            return $post;
        })]);
    }
}
