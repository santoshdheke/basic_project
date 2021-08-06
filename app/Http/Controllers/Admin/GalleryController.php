<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GalleryValidation;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends AdminBaseController
{
    public $view_path = 'gallery';
    public $base_route = 'gallery';
    public $title = 'Gallery';
    public $model;

    public function __construct(Gallery $model)
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
        return view(parent::__loadView('create'));
    }

    public function store(GalleryValidation $request)
    {
        $allData = $request->all();
        $allData['image'] = $this->uploadFile($allData['image']);
        unset($allData['_token']);
        $this->model->create($allData);
        return $this->storeReturnBack($request);
    }

    public function edit($id)
    {
        if (!$row = $this->model->find($id)){
            abort(404);
        }
        return view(parent::__loadView('edit'),compact('row'));
    }

    public function update(GalleryValidation $request,$id)
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

        $galleryImages = GalleryImage::where('gallery_id',$id)->get();
        if (isset($galleryImages) && count($galleryImages)>0){
            foreach ($galleryImages as $galleryImage) {
                $galleryImage->delete();
            }
        }
        $row->delete();
        return redirect()->route('admin.' . $this->base_route . '.index')->with('success', $this->title . ' Detele Successful.');
    }
}
