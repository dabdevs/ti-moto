<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
        $data = $request->validated();
        $data['passord'] = Hash::make($request->password);

        // Create the user
        $user = User::create($data);

         // Assign the 'passenger' role to user
        $user->assignRole('passenger');

        // Create passenger record
        $passenger = Passenger::create([
            'user_id' => $user->id,
        ]);

        // Create Sanctum token
        $token = $user->createToken('passenger-token')->plainTextToken;

        return response()->json([
            'message' => 'Passenger created successfully.',
            'token'   => $token,
            'user'    => $user,
            'passenger' => $passenger
        ], 201);
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
}
