<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Thumbnail;
use App\Http\Requests;
use App\AddPhotoToFlyer;
use Illuminate\Http\Request;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{
    
    /**
     * Apply a photo to the referenced flyer.
     * @param string  $zip     
     * @param string  $street  
     * @param Request $request
     */
    public function store($zip, $street, AddPhotoRequest $request)
    {       
        $flyer = Flyer::locatedAt($zip, $street);
        $photo = $request->file('photo');
        $thumbnail = new Thumbnail();
        (new AddPhotoToFlyer($flyer, $photo, $thumbnail))->save();
    }
}
