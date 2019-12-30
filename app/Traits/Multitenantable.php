<?php

/**
 * @Author: Wedat
 * @Date:   2019-11-21 02:07:06
 * @Last Modified by:   Wedat
 * @Last Modified time: 2019-11-24 17:20:00
 */
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

	protected static function bootMultitenantable()
	{
		if (auth()->check()) {
			static::creating(function ($model) {
				$model->user_id = auth()->id();
			});

			if (auth()->user()->role != 0) { //superadmin 0
				static::addGlobalScope('user_id', function (Builder $builder) {
					$builder->where('user_id', auth()->id());
				});
			}
		}
	}

}