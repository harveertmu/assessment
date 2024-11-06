<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventPayment;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PaymentProviderRequest;
use App\Models\PaymentProvider;
use App\Models\Event;
use App\Models\Company;
use App\Models\PaymentMethod;

class PaymentProviderRequestController extends Controller
{

    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,pending',  // Status can only be 'approved' or 'rejected'
        ]);

        // Find the payment provider request by its ID
        $paymentProviderRequest = PaymentProvider::find($id);

        // Update the status of the payment provider request
        $paymentProviderRequest->update([
            'status' => $validated['status'],
        ]);

        // Redirect back with a success message
        return redirect()->route('finance.payment_provider')
            ->with('success', 'Payment provider request status has been updated successfully.');
    }

    public function show($id)
    {
        $event = PaymentProvider::find($id);

        return view('finance.status_update_provider', compact('event'));
    }
}
