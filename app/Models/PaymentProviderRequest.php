<?php

// app/Models/PaymentProviderRequest.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProviderRequest extends Model
{
    use HasFactory;

    protected $fillable = ['payment_method_name', 'website', 'event_id', 'company_id', 'status'];
}
