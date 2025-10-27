<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassengerStoreRequest;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    /**
     * Display a listing of the passenger.
     */
    public function index()
    {
        $passengers = Passenger::paginate(10);

        return response()->json([
            'passengers' => $passengers
        ]);
    }

    /**
     * Show the form for creating a new passenger.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created passenger in storage.
     */
    public function store(PassengerStoreRequest $request)
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
     * Display the specified passenger.
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified passenger.
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified passenger in storage.
     */
    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified passenger from storage.
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
