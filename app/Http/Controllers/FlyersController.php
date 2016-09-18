<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;

class FlyersController extends Controller
{

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
        $flyer = Flyer::locatedAt($zip, $street)->first();
        if ($flyer == null) {
            return view('frontend.flyers.create');
        }
        return view('frontend.flyers.show', compact('flyer'));
    }

    public function addPhoto($zip, $street, Request $request)
    {
        $file = $request->file('file'); // instanceof UploadedFile

        $fileName = time() . $file->getClientOriginalName();
        $folders = $zip . '-' . str_slug($street);
        // where the file be store?
        $file->move("images/$folders", $fileName);

        $flyer = Flyer::locatedAt($zip, $street)->first();
        $flyer->photos()->create(['path' => "/images/$folders/{$fileName}"]);

        return "F**k Yeah!";
    }
}