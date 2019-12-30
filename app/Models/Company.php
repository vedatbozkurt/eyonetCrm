<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Company extends Model
{
    use Multitenantable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'logo', 'address', 'website', 'status', 
    ];

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function tasks() //notes
    {
        return $this->hasMany('App\Models\Task');
    }

    public function events() 
    {
        return $this->hasMany('App\Models\Event');
    }

    public function documents() 
    {
        return $this->hasMany('App\Models\Document');
    }

    public function employees() {
        return $this->belongsToMany('App\Models\Employee');
    }

    public function services() {
        return $this->belongsToMany('App\Models\Service');
    }

    public function offers() {
        return $this->hasMany('App\Models\Offer');
    }

}
