<?php

/**
 * flash an message , helper function
 * @param  string $title   the title of flash message
 * @param  string $message body of message
 * @return \App\Http\Flash
 */
function flash($title = null, $message = null)
{
	$flash = app(\App\Http\Flash::class); // create an Flash Obj

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

/**
 * Path to a given flyer
 * @param  Flyer $flyer 
 * @return string
 */
function flyer_path($flyer)
{
	return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}