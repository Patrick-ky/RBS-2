<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StallTypes extends Model
{
    protected $fillable =
     [
        'stall_name',
        'price'
    ];

    public function stallNumbers()
    {
        return $this->hasMany(StallNumber::class, 'stall_type_id');
    }

    public function citations()
    {
        return $this->hasMany(Citation::class, 'stall_type_id');
    }
    
}




