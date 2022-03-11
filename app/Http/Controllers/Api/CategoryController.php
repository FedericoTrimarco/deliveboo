<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Plate;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with('plates')->get();
        return response()->json($categories);
    }
}
