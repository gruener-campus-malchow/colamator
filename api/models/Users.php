<?php
class Users extends Model
{
	protected $name = 'users';
	protected $id = 'id';
	protected $searchable = ['names', 'salt'];
	protected $insertable = ['names', 'salt'];

	public function getAll($filter)
	{
		// filters are key-value pairs separated by `&` characters
		//$filter = explode('&', $filter);

		$users = [];
		$dir= 'db/users/';
		foreach (scandir($dir) as $file) {
			if (is_dir($dir.$file)) continue;
			$users[] = pathinfo($file)['filename'];
		}

		// return response from the database
		$this->api_response($users);
	}

	public function getSingle($identifier)
	{

	}

	public function getAttribute($identifier, $attribute)
	{
		if (!$result) $this->api_response('Item Does Not Exist', 404);
		// else, return the attribute; the [0] is needed since the result is wrapped in an array
		else $this->api_response($result[0][$attribute]);
	}

	public function createSingle($data)
	{

		if (!isset($data['username'])) return $this->api_response('username missing', 400);
		if (!isset($data['password'])) return $this->api_response('password missing', 400);
		if (!preg_match('/^[a-zA-Z0-9-_]{4,32}$/', $data['username']))  return $this->api_response('Invalid characters in username', 400);
		$path = 'db/users/'.$data['username'].'.sqlite';
		if (file_exists($path)) return $this->api_response('Username already exists', 409);

		$sql = file_get_contents(__DIR__.'/createUser.sql');

		$sql = array_filter(explode(';',$sql));

		$userDB = new PDO('sqlite:'.$path);

		foreach ($sql as $statement){
			//var_dump($statement);
			$result = $userDB->query($statement);

			if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
		}


		$hash = password_hash($data['password'], PASSWORD_DEFAULT);

		$query = 'INSERT INTO gatherers (username, hash) VALUES ("me","'.$hash.'");';

		$result = $userDB->query($query);
		if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
		//echo $hash;
		//final OK
		$this->api_response('user created');
	}


	public function updateSingle($identifier, $data)
	{
		switch ($identifier){
			case "login":
				if (!isset($data['username'])) return $this->api_response('username missing', 400);
				if (!isset($data['password'])) return $this->api_response('password missing', 400);
				$path = 'db/users/'.$data['username'].'.sqlite';
				if (file_exists($path)){
					$userDB = new PDO('sqlite:'.$path);
					$result = $userDB->query("SELECT hash FROM gatherers WHERE username='me'");

					$stored_hash = $result->fetch()['hash'];

					if (!password_verify($data['password'], $stored_hash)) {
						return $this->api_response('password does not match', 401);
					}
					$_SESSION['username'] = $data['username'];
					return $this->api_response('login successfull');
				}
				break;
			case "add_device_key":
				if (!isset($data['username'])) return $this->api_response('username missing', 400);
				if (!isset($data['device_key'])) return $this->api_response('device key missing', 400);
				if (!isset($data['device_name'])) return $this->api_response('device name missing', 400);
				$path = 'db/users/'.$data['username'].'.sqlite';
		
				if (file_exists($path)){
					$userDB = new PDO('sqlite:'.$path);
					$result = $userDB->query("INSERT INTO devices (name, device_id) VALUES ('".$data['device_name']."','".$data['device_key']."')");
					if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
					return $this->api_response('added a device');
				}
				break;
			case "datatypes":
				
				if (!isset($data['username'])) return $this->api_response('username missing', 400);
				$path = 'db/users/'.$data['username'].'.sqlite';

				if (file_exists($path)){
					$userDB = new PDO('sqlite:'.$path);
					$result = $userDB->query("SELECT 'name', label FROM types");
					if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
					return $this->api_response($result->fetchAll());
				}
				break;
			case "get_device_key":
				
				if (!isset($data['username'])) return $this->api_response('username missing', 400);
				$path = 'db/users/'.$data['username'].'.sqlite';

				if (file_exists($path)){
					$userDB = new PDO('sqlite:'.$path);
					$result = $userDB->query("SELECT 'name', label FROM types");
					if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
					return $this->api_response($result->fetchAll());
				}
				break;
			case "datatypes":
				
				if (!isset($data['username'])) return $this->api_response('username missing', 400);
				$path = 'db/users/'.$data['username'].'.sqlite';

				if (file_exists($path)){
					$userDB = new PDO('sqlite:'.$path);
					$result = $userDB->query("SELECT 'name', label FROM types");
					if ($userDB->errorCode() != "00000") return $this->api_response($userDB->errorInfo(),500);
					return $this->api_response($result->fetchAll());
				}
				break;
				

		}


		// execute the query
		//$this->api_response($this->db->query("UPDATE $this->name SET $updates WHERE $this->id = ?", $values));
	}

	public function replaceSingle($identifier, $data)
	{

		//$this->api_response($this->db->query("REPLACE INTO $this->name ($columns) VALUES ($values_template)", $values));
	}


	public function deleteSingle($identifier)
	{

	}



}
