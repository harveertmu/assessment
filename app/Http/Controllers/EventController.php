<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'location' => 'required|in:Malta,Brazil,Africa,Asia,East Europe,Eurasia',
            'date' => 'required|date',
            'description' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
      
            return response()->json([
                'success' => true,
                'message' => $validator->messages()->first()
            ]);
      

        } else {
            $task = Event::create($request->all());
            $Event = Event::orderBy('id', 'desc')->get();

            return response()->json([
                'body' => view('events', ['event' => $Event])->render(),
                'success' => 'status',
                'message' => 'Task created successfully!'
            ], 200);
        }
    }

    // Remove the specified task
    public function destroy(Event $task)
    {
        $task->delete();
        return redirect()->route('home')->with('success', 'Task deleted successfully.');
    }

    public function changeStatus(Event $task,$id)
    {
        $task = Event::findOrFail($id);
        $validatedData['completed']=1;
        $task->update($validatedData);

        return redirect()->route('home')->with('success', 'Status change successfully.');
    }

}
