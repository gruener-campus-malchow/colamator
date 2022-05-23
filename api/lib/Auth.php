<?php

class Auth
{

	public static function init()
	{
		session_start([
			'name' => 'colamator_session',
			'cookie_secure' => true
		]);
	}

	public static function getUser()
	{
		if (isset($_SESSION['user'])) return $_SESSION['user'];
		return false;
	}

	// TODO: add better security
	public static function login($name, $password)
	{
		$db_path = USER_DB_DIR."$name.sqlite";
		if (!file_exists($db_path)) return false;

		$db = new DB($db_path);
		$hash = $db->query('SELECT hash FROM gatherers WHERE username=\'me\'')[0]['hash'];

		if (!password_verify($password, $hash)) return false;

		$_SESSION['user'] = $name;
		return true;
	}

	public static function logout()
	{
		$_SESSION['user'] = null;
	}

}
