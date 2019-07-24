<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $fillable = [
        'id',
        'equipment_id',
        'users_id',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
