<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title', 'length'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function lecture()
    {
        return $this->hasMany(Lecture::class);
    }
}
