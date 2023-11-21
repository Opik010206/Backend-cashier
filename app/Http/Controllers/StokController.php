<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Exception;
use PDOException;
use Illuminate\Http\Request;
use App\Http\Requests\StokRequest;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Stok::with('menu')->get();
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
            $data = Stok::create($request->all());
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'warning', 'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        try {
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$stok]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StokRequest $request, Stok $stok)
    {
        try {
            $stok->update($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        try {
            // $data = Stok::get();
            // dd($data);
            $data = $stok->delete();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'gagal menghapus data']);
        }
    }
}
