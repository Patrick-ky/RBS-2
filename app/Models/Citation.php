<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    protected $fillable = [
        'client_info_id',
        'violation_id',
        'stall_type_id',
        'stall_number_id',
        'start_date',
        
    ];
    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }

    public function violation()
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }

    public function stallType()
    {
        return $this->belongsTo(StallTypes::class, 'stall_type_id'); // Corrected foreign key name
    }

    public function clientInfo()
    {
        return $this->belongsTo(ClientInfo::class, 'client_info_id');
    }
}