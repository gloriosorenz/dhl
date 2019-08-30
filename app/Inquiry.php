<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'id',
        'subject',
        'inquiry',
        'date_inquired',
        'inquiry_statuses_id',
    ];

    public function inquiry_statuses()
    {
        return $this->belongsTo(InquiryStatus::class, 'inquiry_statuses_id');
    }

    public function employees()
    {
        return $this->belongsTo(User::class, 'employees_id');
    }

    public function admins()
    {
        return $this->belongsTo(User::class, 'admins_id');
    }
}
