<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function store(EventRequest $request)
    {
        // Create the event using the validated data
        $event = Event::create($request->validated());

        // Fetch the latest events (order by ID desc)
        $events = Event::latest()->get();

        // Return the response with the rendered events view and success message
        return response()->json([
            'body' => view('events', compact('events'))->render(),
            'success' => true,
            'message' => 'Event created successfully!'
        ], 200);
    }

    // Remove the specified task
    public function destroy(Event $task)
    {
        $task->delete();
        return redirect()->route('home')->with('success', 'Task deleted successfully.');
    }

    public function changeStatus(Event $task, $id)
    {
        $task = Event::findOrFail($id);
        $validatedData['completed'] = 1;
        $task->update($validatedData);

        return redirect()->route('home')->with('success', 'Status change successfully.');
    }
}
