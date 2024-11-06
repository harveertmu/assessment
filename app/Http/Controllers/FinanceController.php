<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\PaymentProvider;
use App\Models\EventPayment;
use Illuminate\Support\Facades\DB;




class FinanceController extends Controller
{
    public function index()
    {

        $events = Event::all();
        return view('finance.index', compact('events'));
    }

    public function editPayment(Event $event)
    {
        $paymentMethods = PaymentMethod::all();
        $companies = Company::all();
        return view('finance.edit_payment', compact('event', 'paymentMethods', 'companies'));
    }

    public function updatePayment(Request $request, Event $event)
    {
        $id = $event->id;
        // Validate the incoming request data
        $validatedData = $request->validate([
            'company_id' => 'required',
            'payment_method_id' => 'required',
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
                'payment_method_id' => $validatedData['payment_method_id'],
                'vat_rate' => $validatedData['vat_rate'],
                'company_id' => $validatedData['company_id'],


            ]);
        });

        // Redirect back with success message
        return redirect()->route('finance.index')->with('success', 'Event updated successfully!');
    }

    public function requestPaymentProvider()
    {
        $events = Event::all();
        $companies = Company::all();

        return view('finance.request_provider', compact('events', 'companies'));
    }

    public function storePaymentProviderRequest(Request $request)
    {

        $validated = $request->validate([
            'payment_method_name' => 'required|string',
            'website' => 'required|url',
            'event_id' => 'required|exists:events,id',
            'company_id' => 'required|exists:companies,id',
        ]);

        PaymentProvider::create($validated);
        return redirect()->back()->with('success', value: 'Event updated successfully!');;
    }

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
        return redirect()->route('finance')->with('success', 'Event created successfully!');
    }


    public function create()
    {
        return view('finance.create'); // Adjust the view path as needed

    }
}
