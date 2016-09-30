<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\AuthorizesUsers;


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
        // Flyer::createFlyer(Auth::id(), $flyerRequest);

        $flyer = $this->user->publishFlyer( new Flyer($flyerRequest->all()) );

        // flash messaging
        flash()->success('DONE!', 'Flyer successfully created!');
        
        return redirect(flyer_path($flyer));
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
}