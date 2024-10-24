<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Define any fillable fields if necessary
    protected $fillable = ['name', 'description', 'status', 'deadline'];
    protected $casts = [
        'deadline' => 'datetime', // Cast 'deadline' to Carbon instance
    ];
}
