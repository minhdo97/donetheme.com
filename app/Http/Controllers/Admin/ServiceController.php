<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    protected $moduleNameFolder = 'service';
    protected $moduleName = 'Service';

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
            $post = Service::create([
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
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function show(Service $service)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];
        return view('admin.apps.' . $this->moduleNameFolder . '.show', ['breadcrumbs' => $breadcrumbs]);
    }

    public function edit(Service $service)
    {

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $this->moduleName]
        ];

        return view('admin.apps.' . $this->moduleNameFolder . '.edit', ['breadcrumbs' => $breadcrumbs, 'service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        DB::beginTransaction();
        try {

            $service->update([
                'title' => $request->title,
                'body' => $request->body,
                'status' => $request->status,
                'image ' => null,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keywords' => $request->seo_keywords,
            ]);
            if ($service && $request->hasFile('image')) {
                $service->clearMediaCollection('image');
                $service->addMedia($request->file('image'))->toMediaCollection('image');
            }
            DB::commit();
            return redirect()->route('admin.services.index');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('alert-error', $e->getMessage());
        }
    }

    public function destroy(Service $service)
    {
        return $service->delete();
    }

    public function getList()
    {
        return response()->json(['data' => Service::all()]);
    }
}
