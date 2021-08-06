<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends AdminBaseController
{

    public function showLoginForm()
    {
        return view(parent::__loadView('auth.login'));
    }

    public function login(Request $request)
    {
        if (auth($this->guard())->attempt($request->only(['email','password']),$request->remember)){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error','Invalid Login');
    }

    public function logout(Request $request)
    {
        auth($this->guard())->logout();

        return redirect('admin/login');
    }

    private function guard(){
        return 'admin';
    }
}
