<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminBaseController extends Controller
{
    public $theme_path = 'admin_themes.theme_one.';
    public $view_path = '';
    public $title = '';
    public $base_route = '';

    public function __loadView($view)
    {
        $view = $this->theme_path.'.'.$this->view_path.'.'.$view;
        View::composer($view,function ($view){
            $view->with('theme_path', $this->theme_path);
            $view->with('view_path', $this->theme_path.'.'.$this->view_path.'.');
            $view->with('common_path', $this->theme_path.'.'.$this->view_path.'.common.');
            $view->with('title', $this->title);
            $view->with('base_route', 'admin.'.$this->base_route.'.');
            $view->with('admin', $this->admin());
        });
        return $view;
    }

    public function admin()
    {
        return auth('admin')->user();
    }

    public function storeReturnBack($request)
    {
        if ($request->save) {
            return redirect()->route('admin.' . $this->base_route . '.index')->with('success', $this->title . ' Added Successful.');
        }
        return redirect()->back()->with('success', $this->title . ' Added Successful.');
    }

    public function uploadFile($file)
    {

        $folder = $this->folder ?? $this->base_route;

        $destinationPath = public_path('upload/'.$folder);

        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $filename = time() . str_replace(' ', '', $file->getClientOriginalName());
        $file->move($destinationPath, $filename);

        return asset('upload/'.$folder.'/'.$filename);

    }
}
