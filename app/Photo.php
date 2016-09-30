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
    protected $fillable = ['path', 'name', 'thumbnail_path'];

	/**
	 * A photo has belongsto Flyer
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function flyer()
    {
    	return $this->belongsTo(\App\Flyer::class);
    }



    public function baseDir()
    {
        return 'house/images';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir() . '/' . $name;
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;
    }

}
