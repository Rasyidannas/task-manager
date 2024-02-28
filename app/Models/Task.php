<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title"
    ];

    //this will change is_done num value (0 or 1) to be false/true in json
    protected $casts = [
        'is_done' => "boolean"
    ];

    protected $hidden = [
        "updated_at"
    ];
}
