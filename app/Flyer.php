<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	protected $table = 'flyers';

	/**
	 * Fillable fields for a flyer
	 * @var array
	 */
	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

	/**
	 * Find the flyer for the given address
	 * @param  string $zip    
	 * @param  string $street 
	 * @return Builder
	 */
	public function scopeLocatedAt($query, $zip, $street)
	{
		$street = str_replace('-', ' ', $street); // url maybe use - for clear
		return $query->where(compact('zip', 'street'))->first();
	}

	public function addPhotos(Photo $photo)
	{
		return $this->photos()->save($photo);
	}

	public function getPriceAttribute($price)
	{
		return 'VNĐ' . number_format($price);
	}

	/**
	 * A Flyer is composed of many photos
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function photos()
    {
    	return $this->hasMany(\App\Photo::class);
    }
}
