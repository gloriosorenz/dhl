<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'name', 
        'it_tag', 
        'asset_tag', 
        'specifications', 
        'serial_number', 
        'unit_cost', 
        'date_purchased', 
        'date_issued', 
        // 'quantity', 
        // 'active',

        'plan', 
        'calls', 
        'text', 
        'local_calls', 
        'local_text', 
        'consumable', 
        'ndd', 
        'idd', 
        'data', 
        'roaming', 

        'brands_id',
        'equipment_types_id',
        'equipment_statuses_id',
    ];

    public function equipment_types()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_types_id');
    }

    public function equipment_statuses()
    {
        return $this->belongsTo(EquipmentStatus::class, 'equipment_statuses_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brands_id');
    }
}
