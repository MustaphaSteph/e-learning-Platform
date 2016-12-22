<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function courses() // tags for course
    {
        return $this->belongsToMany(Course::class);
    }
}
