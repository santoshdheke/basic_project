<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends AdminBaseController
{
    public $view_path = 'dashboard';

    public function index()
    {
        return view(parent::__loadView('index'));
    }
}
