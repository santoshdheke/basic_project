<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductCategoryValidation;
use App\Models\ProductCategory;

class ProductCategoryController extends AdminBaseController
{
    public $view_path = 'product-category';
    public $base_route = 'product-category';
    public $title = 'Product Category';
    public $model;

    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model->get();
        return view(parent::__loadView('index'),compact('rows'));
    }

    public function store(ProductCategoryValidation $request)
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
