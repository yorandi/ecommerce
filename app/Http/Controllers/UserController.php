<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype == 'user') {
            return view('dashboard');

        } else if(Auth::check() && Auth::user()->usertype == 'admin') {
            return view('admin.dashboard');
        }

    }
}
