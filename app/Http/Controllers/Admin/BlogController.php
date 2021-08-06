<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogValidation;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends AdminBaseController
{
    public $view_path = 'blog';
    public $base_route = 'blog';
    public $title = 'Blog';
    public $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model->get();
        return view(parent::__loadView('index'),compact('rows'));
    }

    public function create()
    {
        $categories = BlogCategory::get();
        return view(parent::__loadView('create'),compact('categories'));
    }

    public function store(BlogValidation $request)
    {
        $allData = $request->all();
        if (isset($allData['image'])){
            $allData['image'] = $this->uploadFile($allData['image']);
        }
        $this->model->create($allData);
        return $this->storeReturnBack($request);
    }

    public function edit($id)
    {
        if (!$row = $this->model->find($id)){
            abort(404);
        }
        $categories = BlogCategory::get();
        return view(parent::__loadView('edit'),compact('row','categories'));
    }

    public function update(BlogValidation $request,$id)
    {
        if (!$row = $this->model->find($id)){
            abort(404);
        }

        $allData = $request->all();
        if (isset($allData['image'])){
            $allData['image'] = $this->uploadFile($allData['image']);
        }

        $row->update($allData);
        return redirect()->route('admin.' . $this->base_route . '.index')->with('success', $this->title . ' Update Successful.');
    }

    public function destroy($id)
    {
        if (!$row = $this->model->find($id)){
            abort(404);
        }

        $row->delete();
        return redirect()->route('admin.' . $this->base_route . '.index')->with('success', $this->title . ' Detele Successful.');
    }
}
