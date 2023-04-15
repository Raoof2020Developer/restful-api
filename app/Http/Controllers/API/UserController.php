<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use \App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = UserResource::collection(User::all());
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserResource(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]));
        return $user->response()->setStatusCode(200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = new UserResource(User::findOrFail($id));
        return $user->response()->setStatusCode(200, "User returned successfully")->header('Additional Header', true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = new UserResource(User::findOrFail($id));

        $user->update($request->all());
    
        return $user->response()->setStatusCode(200, "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        
        return 204;
    }
}
