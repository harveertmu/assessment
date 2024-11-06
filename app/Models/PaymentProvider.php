<?php

// app/Models/PaymentProviderRequest.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    use HasFactory;
    protected $table = 'payment_provider_requests';


    protected $fillable = ['payment_method_name', 'website', 'event_id', 'company_id', 'status'];

    public function event()
    {
        return $this->belongsTo(related: Event::class);

    }

}
