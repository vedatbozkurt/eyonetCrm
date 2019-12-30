<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Payment extends Model
{
    use Multitenantable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id', 'company_id', 'service_id', 'name', 'status', 'price', 'details', 'payment_method', 
    ];

    function company() {
    	return $this->belongsTo('App\Models\Company');

    }
    function service() {
    	return $this->hasOne('App\Models\Service', 'id', 'service_id');

    }
}
