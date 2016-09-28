<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        parent::__construct();
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

    /**
     * create and store a new flyer.
     * @param  FlyerRequest $flyerRequest 
     * @return void
     */
    public function store(FlyerRequest $flyerRequest)
    {
        Flyer::createFlyer(Auth::id(), $flyerRequest);
        // persist the flyer
        // Flyer::create($flyerRequest->all());

        // flash messaging
        flash()->success('DONE!', 'Flyer successfully created!');
        
        return view('frontend.flyers.create'); // temporary
    }

    /**
     * detail flyer
     * @param  string $zip    
     * @param  string $street 
     * @return void
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street); // if model not found then listen to it and response to 404 page.

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

        $flyer = Flyer::locatedAt($zip, $street);

        if ($flyer->user_id !== Auth::id()) {
            if ($request->ajax()) {
                return response(['message' => 'Nope!'], 403);
            }

            flash('no way.');

            return redirect('/');
        }

        $photo = $this->makePhoto($request->file('photo'));

        $flyer->addPhotos($photo);
    }

    /**
     * named a photo and move it
     * @param  UploadedFile $file 
     * @return App\Photo
     */
    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
            ->move($file);
    }
}