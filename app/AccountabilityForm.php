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
        'departments_id',
        'issued_date',
        'admins_id',
        'employees_id',
        'equipment_id',
        'form_statuses_id',
    ];


    public function employees()
    {
        return $this->belongsTo(User::class, 'employees_id');
    }

    public function admins()
    {
        return $this->belongsTo(User::class, 'admins_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'departments_id');
    }

    public function form_statuses()
    {
        return $this->belongsTo(FormStatus::class, 'form_statuses_id');
    }
}
