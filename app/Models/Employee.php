<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Employee extends Model
{
    use Multitenantable;
    protected $fillable = [
        'user_id','name', 'email', 'password','status','image','position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function companies() {
        return $this->belongsToMany('App\Models\Company');
    }
}
