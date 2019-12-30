<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Event extends Model
{
    use Multitenantable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id', 'name', 'color', 'description', 'start_date', 'end_date', 
    ];

    function company() {
        return $this->belongsTo('App\Models\Company');

    }
}
