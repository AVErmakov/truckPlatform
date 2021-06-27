<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function vehicleType() {
        return $this->belongsTo(VehicleType::class);
    }

    public function searchSetting() {
        return $this->hasOne(SearchSetting::class);
    }

    public function loadType() {
        return $this->belongsToMany(LoadType::class);
    }

}
