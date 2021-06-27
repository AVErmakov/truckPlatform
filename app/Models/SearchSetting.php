<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchSetting extends Model
{
    use HasFactory;

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function from_town() {
        return $this->belongsTo(Town::class, 'from_town_id');
    }

    public function to_town() {
        return $this->belongsTo(Town::class, 'to_town_id');
    }

}
