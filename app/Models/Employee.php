<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'dob', 'hiring_date', 'experience',
        'address', 'zip_code', 'city', 'role', 'availability', 'status', 'password', 'photo',
    ];
}
