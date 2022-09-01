<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts() {
        return $this->morphByMany('App\Models\Posts', 'taggable');
    }

    public function videos() {
        return $this->morphByMany('App\Models\Video', 'taggable');
    }
}
