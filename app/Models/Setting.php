<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'logo', 'company_name', 'domain', 'address', 'phone', 'currency_id', 
    ];
    //
}
