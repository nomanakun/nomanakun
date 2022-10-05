<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class login extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->exists('admin'))
        {
            return redirect('/form');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $pass = $request->password;
        $cingcong = '5f4dcc3b5aa765d61d8327deb882cf99';
        $password = md5($pass);

        if($password == $cingcong)
        {
            $request->session()->put('admin', 'yeonamchin');
            return redirect()->route('form');
        }
        else{
            Alert::error('Error', 'Password/Username Salah');
            return view('/login');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        $request->session()->flush();
        return view('login');
    }
}
