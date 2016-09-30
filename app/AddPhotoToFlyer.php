<?php

namespace App;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToFlyer
{
	protected $flyer;

	protected $file;

	protected $thumbnail;

	public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null)
	{
		$this->flyer = $flyer;
		$this->file = $file;
		$this->thumbnail = ($thumbnail ? $thumbnail : null);
	}

	public function save()
	{
		// 1. Attach the photo to the flyer
		$photo = $this->flyer->addPhotos($this->makePhoto());

		// 2. Move the photo to the images folder
		$this->file->move($photo->baseDir(), $photo->name);

		// 3. generate a thumbnail
		$this->thumbnail->createThumb($photo->path, $photo->thumbnail_path);
	}

	public function makePhoto()
	{
		return ( new Photo(['name' => $this->makeFileName()]) );
	}

	public function makeFileName()
	{
		$name = sha1( time() . $this->file->getClientOriginalName());
        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
	}
}