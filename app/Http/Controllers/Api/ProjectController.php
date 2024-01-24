<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with(['category', 'technologies'])->paginate(3);
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['category', 'technologies'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $project
            ]
        );
    }

    public function searchByCategory(Request $request)
    {

        // $projects = Project::where('category', 'like', '%' . $request->query('categories') . '%')->paginate(3);
        // return response()->json(
        //     [
        //         'success' => true,
        //         'results' => $projects
        //     ]
        // );

        $projects = Project::whereHas('category', function($query) use ($request){
            $query->where('name', 'like', '%' . $request->query('categories') . '%');
        })->get();
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );

    }
}
