<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
    	parent::boot();

    	static::deleting(function($image) {
    		Storage::disk('public')->delete($image->url);
    	});
    }
}
