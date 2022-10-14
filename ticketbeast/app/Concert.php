<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    // do not pass user input into constructor of your models
    protected $guarded = [];
}
