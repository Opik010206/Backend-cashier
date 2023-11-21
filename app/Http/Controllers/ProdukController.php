<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\ProdukRequest;
use Exception;
use Illuminate\Http\Request;
use PDOException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Produk::with('category')->get();
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
            $data = Produk::create($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'warning', 'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        try {
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$produk]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        try {
            $produk->update($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            // $data = Produk::get();
            // dd($data);
            $data = $produk->delete();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'gagal menghapus data']);
        }
    }
}
