<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReasonCode extends Model
{
    protected $fillable = [
        'code',
        'reason',
    ];
}
