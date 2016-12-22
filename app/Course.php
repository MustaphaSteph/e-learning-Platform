<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'unique_id',
        'title',
        'introduction',
        'description',
        'requirement',
        'audience',
        'benefit',
        'price',
        'length',
        'image',
        'demo'
    ];

    public function user() // admin or teacher
    {
      return  $this->belongsTo(User::class);
    }

    public function users() // users courses
    {
        return $this->belongsToMany(User::class)->withPivot('rating', 'comment');
    }

    public function tags() // course tags
    {
        return $this->belongsToMany(Tag::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
