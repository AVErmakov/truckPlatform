<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;

    public function roadTypes() {
        return $this->belongsTo(RoadType::class);
    }

    public function node_1() {
        return $this->belongsTo(Node::class);
    }

    public function node_2() {
        return $this->belongsTo(Node::class);
    }

}
