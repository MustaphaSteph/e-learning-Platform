<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','picture','facebook','full_name','twitter','linkedin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course() // teacher or admin
    {
        return $this->hasMany(Course::class);
    }

    public function courses() // course for users
    {
        return $this->belongsToMany(Course::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }



    public function hasRole($role) // test if the user has a role to access .
    {
            if($this->role()->where('name',$role)->first())
            {
                return true;
            }

        return false;
    }

    public function hasRightForCourse($course) // test if the course belongs to the user
    {
        if($this->course()->where('id',$course)->first()|| $this->hasRole('admin'))
        {
            return true;
        }
        return false;
    }


}
