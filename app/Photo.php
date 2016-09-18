<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $table = 'flyer_photos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path'];


	/**
	 * A photo has belongsto Flyer
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function flyer()
    {
    	return $this->belongsTo(\App\Flyer::class);
    }
}
