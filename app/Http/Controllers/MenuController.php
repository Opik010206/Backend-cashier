<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Exception;
use PDOException;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Menu::with('jenis')->get();
            // dd($data);
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
            $data = Menu::create($request->all());
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'warning', 'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        try {
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$menu]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        try {
            $menu->update($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            // $data = Jenis::get();
            // dd($data);
            $data = $menu->delete();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'gagal menghapus data']);
        }
    }
}
