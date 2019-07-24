<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'logo', 'equipment_types_id'
    ];

    public function equipment_types()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_types_id');
    }
}
