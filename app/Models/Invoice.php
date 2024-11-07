<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'amount',
        'due_date',
        'project_id',
        'balance_owed',
        'status',
        'type',
        'private_note',
        'custom_name',
    ];

    // Cast dates to Carbon instances
    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
    ];

    // Define the relationship
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
