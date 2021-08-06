<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductValidation;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends AdminBaseController
{
    public $view_path = 'product';
    public $base_route = 'product';
    public $title = 'Product';
    public $model;

    public function __construct(Product $model)
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
        $categories = ProductCategory::get();
        return view(parent::__loadView('create'),compact('categories'));
    }

    public function store(ProductValidation $request)
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
        $categories = ProductCategory::get();
        return view(parent::__loadView('edit'),compact('row','categories'));
    }

    public function update(ProductValidation $request,$id)
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
