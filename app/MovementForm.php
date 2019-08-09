<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovementForm extends Model
{
    protected $fillable = [
        'id',
        'mf_num',
        'prepared_date',
        'accountability_forms_id',
        'admins_id',
        'employees_id',
        'reason_codes_id',
        'form_statuses_id',
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
    
    public function form_statuses()
    {
        return $this->belongsTo(FormStatus::class, 'form_statuses_id');
    }

    public function reason_codes()
    {
        return $this->belongsTo(ReasonCode::class, 'reason_codes_id');
    }
}
