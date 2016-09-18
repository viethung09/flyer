<?php

namespace App\Http;

class Flash
{
	/**
	 * create a base flash message
	 * @param  string $title
	 * @param  string $message
	 * @param  string $level   type of message
	 * @param  string|null $key
	 * @return void
	 */
	public function create($title, $message, $level, $key = 'flash_message')
	{
		
		session()->flash($key, [
			'title' 	=> $title,
			'message'	=> $message,
			'level'		=>  $level
		]);
	}

	/**
	 * create info flash message
	 * @param  string $title   
	 * @param  string $message 
	 * @return \App\Http\Flash
	 */
	public function info($title, $message)
	{
		return $this->create($title, $messsage, 'info');
	}

	/**
	 * create success message
	 * @param  string $title   
	 * @param  string $message 
	 * @return \App\Http\Flash 
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}

	/**
	 * create success error
	 * @param  string $title   
	 * @param  string $message 
	 * @return \App\Http\Flash 
	 */
	public function error($title, $message)
	{
		return $this->create($title, $messsage, 'error');
	}

	/**
	 * create overlay message
	 * @param  string $title   
	 * @param  string $message 
	 * @return \App\Http\Flash 
	 */
	public function overlay($title, $message, $level = 'success')
	{
		return $this->create($title, $message, $level, 'flash_message_overlay');
	}
}