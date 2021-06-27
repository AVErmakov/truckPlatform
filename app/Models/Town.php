<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    public function node() {
        return $this->belongsTo(Node::class);
    }

    public function search_settings() {
        return $this->hasMany(SearchSetting::class);
    }

    public function distance_from() {
        return $this->hasMany(Distance::class, 'town_1_id');
    }

    public function distance_to() {
        return $this->hasMany(Distance::class, 'town_2_id');
    }

    public function load_from() {
        return $this->hasMany(Load::class, 'from_town_id');
    }

    public function load_to() {
        return $this->hasMany(Load::class, 'to_town_id');
    }
}
