<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'logo', // Include this if you are handling logo uploads
    ];
}
