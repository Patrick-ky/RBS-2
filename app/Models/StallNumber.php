<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StallNumber extends Model
{
    protected $fillable = [
        'stall_number',
        'status',
        'nameforstallnumber',
        'description',
        'stall_type_id'
    ];

    public function stalltype()
    {
        return $this->belongsTo(StallTypes::class, 'stall_type_id'); 
    }

    public function clientInfo()
{
    return $this->belongsTo(ClientInfo::class);
}
public function citations()
{
    return $this->hasMany(Citation::class, 'client_info_id');
}
}

