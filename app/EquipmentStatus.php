<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentStatus extends Model
{
    protected $fillable = [
        'id',
        'status',
    ];
}
