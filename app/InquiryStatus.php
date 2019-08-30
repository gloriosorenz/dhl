<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InquiryStatus extends Model
{
    protected $fillable = [
        'id',
        'status',
    ];
}
