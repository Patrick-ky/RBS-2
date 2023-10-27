<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'violation_name',
        'penalty_value',
        'stall_number_id'
    ];

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }

    public function citations()
    {
        return $this->hasMany(Citation::class, 'violation_id');
    }

    public function clientInfos()
    {
        return $this->belongsToMany(ClientInfo::class, 'citations', 'violation_id', 'client_info_id')
            ->withPivot('start_date');
    }
}
