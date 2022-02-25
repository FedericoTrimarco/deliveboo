<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        // $id = Auth::user()->id;
        // $user = User::where('id', $id)->first();
        return view('admin.home');
    }
}
