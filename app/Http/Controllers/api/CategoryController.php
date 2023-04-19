<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // json_encode()
        // new CategoryResource($category);
        // return CategoryResource::collection(Category::all());
        // return Category::all();
        return new CategoryCollection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            $category = Category::create(
                [
                    'name' => $request->name,
                    'category_id' => $request->category_id
                ]
            );
            return response()->json(['message' => 'Category Added', 'category' => new CategoryResource($category)]);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['message' => 'Err in Insert']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($category = Category::find($id)) {
            return response()->json(['message' => 'Category Show', 'category' => new CategoryResource($category)]);
        } else {
            return response()->json(['message' => 'Category Not Found'], 401);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);
            $category = Category::find($id);
            $category->update($request->only(['name', 'category_id']));
            return response()->json(['message' => 'Category Updated', 'category' => new CategoryResource($category)]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (Category::destroy($id)) {
                return response()->json(['message' => 'Category Deleted']);
            } else {
                return response()->json(['message' => 'Category Not Found'], 500);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
