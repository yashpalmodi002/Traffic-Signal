<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'sequence_a',
        'sequence_b',
        'sequence_c',
        'sequence_d',
        'green_light_intervals',
        'yellow_light_intervals',
    ];
}
