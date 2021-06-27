<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    public function town() {
        return $this->hasOne(Town::class);
    }

    public function noadType() {
        return $this->belongsTo(NodeType::class);
    }

    public function road_1() {
        return $this->hasMany(Road::class);
    }

    public function road_2() {
        return $this->hasMany(Road::class);
    }

}
