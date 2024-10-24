<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|in:Stripe,Pay.com,Apcopay,HiPay,BPPay,Crypto Pay',
            'type' => 'required|in:Traditional,Crypto',
            'website' => 'nullable|url',
        ]);

        $paymentMethod = PaymentMethod::create($request->all());

        return response()->json($paymentMethod, 201);
    }
}
