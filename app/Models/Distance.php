<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;

    public function town_from() {
        return $this->belongsTo(Town::class, 'town_1_id');
    }
    public function town_to() {
        return $this->belongsTo(Town::class, 'town_2_id');
    }
}
