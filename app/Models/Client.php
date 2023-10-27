<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StallTypes;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'purok',
        'street',
        'barangay',
        'city',
        'province',
        'block',
        'lot',
        'clients_number',
        'gender',
    ];
    public function stalltype()
    {
        return $this->belongsTo(StallTypes::class, 'stall_type_id');
    }
    
    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }
    
    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
    
   
}
