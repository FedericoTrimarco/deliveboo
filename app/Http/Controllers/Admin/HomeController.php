<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plate;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $plates = Plate::where('id', $id)->get();
        return view('admin.home', compact('user', 'plates'));
    }
}
