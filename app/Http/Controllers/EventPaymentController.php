<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventPayment;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\PaymentProvider;


class EventPaymentController extends Controller
{

    public function index()
    {

        $events = PaymentProvider::with('event')->get();
        // dd($events);
        return view('finance.payment_provider', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'company_id' => 'required|exists:companies,id',
            'vat_rate' => 'required|numeric',
        ]);

        EventPayment::create($validated);
        return redirect()->back()->with('success', value: 'Event Payment add successfully!');;
    }

    public function update(Request $request, EventPayment $eventPayment)
    {
        $validated = $request->validate([
            'vat_rate' => 'required|numeric',
        ]);

        $eventPayment->update($validated);
    }

    public function create()
    {
        // Fetch all the required data (events, payment methods, companies) to populate the form
        $events = Event::all();  // Assuming you have an Event model
        $paymentMethods = PaymentMethod::all();  // Assuming you have a PaymentMethod model
        $companies = Company::all();  // Assuming you have a Company model

        return view('finance.create_event_payment', compact('events', 'paymentMethods', 'companies'));
    }
}
