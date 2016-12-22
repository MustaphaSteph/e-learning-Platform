<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{

    protected $fillable = ['title','description','length','link'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
