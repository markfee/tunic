<?php

namespace App\Tunic\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = ["filename", "width", "height", "time_taken"];
    protected $dates = ["time_taken"];
}
