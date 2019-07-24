<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovementForm extends Model
{
    protected $fillable = [
        'id',
        'accountability_forms_id',
        'admins_id',
        'employees_id',
        'equipment_id',
        'reason_codes_id',
        'remarks',
    ];

    public function employees()
    {
        return $this->belongsTo(User::class, 'employees_id');
    }

    public function admins()
    {
        return $this->belongsTo(User::class, 'admins_id');
    }

    public function accountability_forms()
    {
        return $this->belongsTo(AccountabilityForm::class, 'accountability_forms_id');
    }
}
