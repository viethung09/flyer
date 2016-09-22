<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Flyer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.home');
    }
	/**
	 * Create form for creating a new flyer
	 * @return Response
	 */
    public function create()
    {
    	return view('frontend.flyers.create');
    }

    public function store(FlyerRequest $flyerRequest)
    {
        // persist the flyer
        Flyer::create($flyerRequest->all());

        // flash messaging
        flash()->success('DONE!', 'Flyer successfully created!');
        
        return view('frontend.flyers.create'); // temporary
    }

    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('frontend.flyers.show', compact('flyer'));
    }

    /**
     * Apply a photo to the referenced flyer.
     * @param string  $zip     
     * @param string  $street  
     * @param Request $request
     */
    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = Photo::fromForm($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhotos($photo);

    }
}