<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

//    public $timestamps = false;

    public function loadType() {
        return $this->belongsTo(LoadType::class);
    }

    public function town_from() {
        return $this->belongsTo(Town::class, 'from_town_id');
    }

    public function town_to() {
        return $this->belongsTo(Town::class, 'to_town_id');
    }

}
