<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'employee', 'start_date', 'end_date', 'finished', 'description'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
