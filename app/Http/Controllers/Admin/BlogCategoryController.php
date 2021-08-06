<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BlogCategoryValidation;
use App\Models\BlogCategory;

class BlogCategoryController extends AdminBaseController
{
    public $view_path = 'blog-category';
    public $base_route = 'blog-category';
    public $title = 'Blog Category';
    public $model;

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model->get();
        return view(parent::__loadView('index'),compact('rows'));
    }

    public function store(BlogCategoryValidation $request)
    {
        $allData = $request->all();
        $this->model->create($allData);
        return redirect()->back()->with('success',$this->title.' Added Successful');
    }

    public function destroy($id)
    {
        if (!$row = $this->model->find($id)){
            abort(404);
        }

        $row->delete();
        return redirect()->back()->with('success', $this->title . ' Detele Successful.');
    }
}
