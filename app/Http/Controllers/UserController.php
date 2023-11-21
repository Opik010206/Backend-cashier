<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PDOException;

class UserController extends Controller
{
    public function index() 
    {
        //
    }

    public function store(UserRequest $request)
    {
        try {
            $data = User::create($request->all());
            return response()->json(['status'=>true, 'message'=> 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal menampilkan data']);
        }
    }
}