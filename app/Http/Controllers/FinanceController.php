<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\EventPayment;
use App\Models\Event;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;


class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('eventPayments')->get();


        return view('finance.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finance.create'); // Adjust the view path as needed

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|in:Malta,Brazil,Africa,Asia,East Europe,Eurasia',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        // Create the event (you might need to adjust this depending on your model)
        Event::create($validatedData);

        // Redirect or return a response
        return redirect()->route('finance-dashboard')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $event = Event::find($id);
        return view('events.show', compact('event'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // die('sdf');
        $event = Event::find($id);
        $paymentMethods=PaymentMethod::get();
        $companies =Company::get();
        // dd( $paymentMethods);
        return view('finance.edit', compact('event','companies','paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'company' => 'required|string',
            'payment_method' => 'required|string',
            'vat_rate' => 'required|numeric|min:0',
        ]);

        // Start a database transaction
        DB::transaction(function () use ($request, $id, $validatedData) {
            // Get all input data
            $input = $request->all();

            // Find the event by ID and update it
            $event = Event::find($id);

            if (!$event) {
                // Handle the case where the event is not found
                return redirect()->back()->with('error', 'Event not found.');
            }

            $event->update($input);

            // Create a new event payment
            EventPayment::create([
                'event_id' => $event->id,
                'payment_method' => $validatedData['payment_method'],
                'vat_rate' => $validatedData['vat_rate'],
                'company' => $validatedData['company'],


            ]);
        });

        // Redirect back with success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
