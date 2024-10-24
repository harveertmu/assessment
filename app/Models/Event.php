<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'date',
        'description',
    ];

    // Define relationships if needed
    public function eventPayments()
    {
        return $this->hasMany(EventPayment::class);
    }
}
