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
	public static function locatedAt( $zip, $street)
	{
		$street = str_replace('-', ' ', $street); // url maybe use - for clear
		return static::where(compact('zip', 'street'))->firstOrFail();
	}

	public function addPhotos(Photo $photo)
	{
		return $this->photos()->save($photo);
	}

	public function getPriceAttribute($price)
	{
		return '$' . number_format($price);
	}

	/**
	 * A Flyer is composed of many photos
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function photos()
    {
    	return $this->hasMany(\App\Photo::class);
    }

    public static function createFlyer($id, $flyerRequest)
    {
    	$flyer = new static();
        $flyer->user_id = $id;
        $flyer->street = $flyerRequest->street;
        $flyer->city = $flyerRequest->city;
        $flyer->state = $flyerRequest->state;
        $flyer->country = $flyerRequest->country;
        $flyer->zip = $flyerRequest->zip;
        $flyer->price = $flyerRequest->price;
        $flyer->description = $flyerRequest->description;
        $flyer->save();
    }
}
