<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['client_info_id', 'payment_for', 'amount', 'status'];

    public function clientInfo()
    {
        return $this->belongsTo(ClientInfo::class);
    }
}
