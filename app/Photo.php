<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
	protected $table = 'flyer_photos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path'];

    protected $baseDir = 'house/images';

	/**
	 * A photo has belongsto Flyer
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function flyer()
    {
    	return $this->belongsTo(\App\Flyer::class);
    }

    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;
        $fileName = time() . $file->getClientOriginalName();

        $photo->path =  $photo->baseDir . '/' . $fileName;

        // where the file be store?
        $file->move($photo->baseDir, $fileName);

        return $photo;
    }
}
