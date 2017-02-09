<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Url extends Model
{
    public $timestamps = false;

    protected $fillable = ['url', 'shortened'];

    public static function getUniqueShortUrl(){
		
		$shortened = str_random(5);

		if (static::whereShortened($shortened)->count() >0) {
			return static::getUniqueShortUrl();
		}

		return $shortened;
	}
}
