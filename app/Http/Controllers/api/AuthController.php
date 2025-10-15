<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validateDate = Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required',
        ]);

        if($validateDate->fails()){
            return response()->json(['success'=>false, 'data'=>$validateDate->errors()]);
        }
        return response()->json(['success'=>true, 'data'=>"user"]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        // $user = User::create($data);
        return response()->json(['success'=>true, 'data'=>"user"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
{
    $creat = $this->store($request);
    return response()->json(['token' => $creat]);
    $credentials = $request->only('email', 'password');

    if (!$token = Auth::attempt($credentials)) {
        return response()->json(['error' => 'Unauthorizedklkkl'], 401);
    }

    return response()->json(['token' => $token]);
}

}
