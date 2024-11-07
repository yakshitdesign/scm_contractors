<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contractor_id',
        'foreman',
        'project_manager_id',
        'start_date',
        'end_date',
        'amount',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'project_manager_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
