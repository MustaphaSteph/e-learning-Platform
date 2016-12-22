<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ['title','content','image','unique_id','time_to_read','picture'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
