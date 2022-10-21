<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $moduleNameFolder = 'page';
    protected $moduleName = 'Page';

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

        return view('admin.apps.' . $this->moduleNameFolder . '.create', ['breadcrumbs' => $breadcrumbs]);
    }

    public function store(CreatePostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Page::create([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
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
            return redirect()->route('admin.pages.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }


    public function show(Page $page)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.show', ['breadcrumbs' => $breadcrumbs]);
    }

    public function edit(Page $page)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.edit', ['breadcrumbs' => $breadcrumbs, 'page' => $page]);
    }

    public function update(Request $request, Page $page)
    {
        DB::beginTransaction();
        try {
            $page->update([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'image ' => null,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keywords' => $request->seo_keywords,
            ]);
            if ($page && $request->hasFile('image')) {
                $page->clearMediaCollection('image');
                $page->addMedia($request->file('image'))->toMediaCollection('image');
            }
            DB::commit();
            return redirect()->route('admin.pages.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function destroy(Page $page)
    {
        return $page->delete();
    }

    public function getList()
    {
        return response()->json(['data' => Page::all()]);
    }
}
