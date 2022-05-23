<?php

class Auth
{

	public function __construct()
	{
		session_start([
			'name' => 'colamator_session',
			'cookie_secure' => true
		]);
	}

}
