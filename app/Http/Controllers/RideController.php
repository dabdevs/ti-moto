<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
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
        //
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

    /**
     * Cancel a ride.
     */
    public function cancelRide(Request $request, Ride $ride)
    {
        $user = $request->user();

        if (!$user->can('cancel-assigned-ride')) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        if ($ride->status === 'in_progress') {
            return response()->json(['message' => 'Cannot cancel a ride in progress'], 403);
        }

        $ride->update([
            'status' => 'cancelled',
            'cancelled_by' => $user->role,
            'cancel_reason' => $request->reason
        ]);

        // Notify passenger, log reason, etc.
        return response()->json(['message' => 'Ride cancelled successfully']);
    }

}
