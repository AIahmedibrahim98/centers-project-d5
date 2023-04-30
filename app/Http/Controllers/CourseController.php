<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('courses.create');
    }
    public function sub_categories(Request $request)
    {
        if ($request->category_id) {
            return response()->json(['sub_categories' => Category::where('category_id', $request->category_id)->get()]);
        } else {
            return response()->json(['sub_categories' => []]);
        }
    }
}
