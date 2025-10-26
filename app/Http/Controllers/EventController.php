<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the event.
     */
    public function index()
    {
        $events = Event::select('id', 'name', 'date', 'time', 'location')->paginate(10);

        return response()->json([
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created event
     */
    public function store(EventStoreRequest $request)
    {
        $data = $request->validated();

        Event::create($data);

        return response()->json([
            'message' => 'Event created successfuly.',
        ], 201);
    }

    /**
     * Display the specified event.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
