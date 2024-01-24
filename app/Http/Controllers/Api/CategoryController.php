<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return response()->json(
            [
                'success' => true,
                'results' => $categories
            ]
        );
    }
}
