<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Exception;
use Illuminate\Http\Request;
use PDOException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Category::get();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = Category::create($request->all());
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$category]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // $data = Category::get();
            // dd($data);
            $data = $category->delete();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'gagal menghapus data']);
        }
    }
}
