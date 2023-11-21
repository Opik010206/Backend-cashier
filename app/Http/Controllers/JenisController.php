<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Http\Request;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Jenis::with('category')->get();
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
            $data = Jenis::create($request->all());
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'warning', 'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jeni)
    {
        try {
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$jeni]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisRequest $request, Jenis $jeni)
    {
        try {
            $jeni->update($request->all());
            // dd($data);
            return response()->json(['status'=>true, 'message'=>'success']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'data gagal ditambahkan', 'error_type'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        try {
            // $data = Jenis::get();
            // dd($data);
            $data = $jeni->delete();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'success', 'gagal menghapus data']);
        }
    }
}
