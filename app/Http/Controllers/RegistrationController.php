<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassengerStoreRequest;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     *  Register a new passenger
     */
    public function registerPassenger(PassengerStoreRequest $request)
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
}
