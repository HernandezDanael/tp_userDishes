<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishe extends Model
{
    protected $casts = [
        'recipe' => 'encrypted',
    ];



    /** @use HasFactory<\Database\Factories\DisheFactory> */
    use HasFactory;
}
