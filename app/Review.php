<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['rating','content'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
