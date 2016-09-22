<?php

namespace App;

use Image;
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
    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $baseDir = 'house/images';

	/**
	 * A photo has belongsto Flyer
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function flyer()
    {
    	return $this->belongsTo(\App\Flyer::class);
    }

    /**
     * Build a new photo instance from a file upload.
     * @param  string $name 
     * @return seft
     */
    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    /**
     * Set the name, path, thumbnail of photo
     * @param  string $name name of photo
     * @return App\Photo
     */
    public function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name); // move method from UploadedFile
        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}
