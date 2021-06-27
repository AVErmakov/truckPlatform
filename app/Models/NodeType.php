<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeType extends Model
{
    use HasFactory;

    public function node() {
        return $this->hasMany(Node::class);
    }

}
