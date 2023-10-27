<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'monthly',
        'violation_id',
        'total_balance',
        'client_id',
        'stall_number_id',
        'stall_type_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); 
    }

    public function violation() 
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }

    public function stallType()
    {
        return $this->belongsTo(StallTypes::class, 'stall_type_id');
    }

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }

 
}
