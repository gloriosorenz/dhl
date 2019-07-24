<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountabilityForm extends Model
{
    //

    protected $fillable = [
        'id',
        'af_num',
        'designation',
        'department',
        'issued_date',
        'admins_id',
        'employees_id',
        'request_forms_id',
        'equipment_id',
    ];


    public function employees()
    {
        return $this->belongsTo(User::class, 'employees_id');
    }

    public function admins()
    {
        return $this->belongsTo(User::class, 'admins_id');
    }

    public function request_forms()
    {
        return $this->belongsTo(RequestForm::class, 'request_forms_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
