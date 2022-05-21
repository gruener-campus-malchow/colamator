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
		
		if (!isset($data['username'])) return $this->api_response('Username missing', 400);
		$path = 'db/users/'.$data['username'].'.sqlite';
		if (file_exists($path)) return $this->api_response('Username already exists', 409);
		
		$sql = file_get_contents(__DIR__.'/createUser.sql');
		
		$userDB = new PDO('sqlite:'.$path);
		$statement = $userDB->query($sql);
				
		if ($statement->errorCode() == 0) $this->api_response('');
		else $this->api_response($statement->errorInfo());
	}


	public function updateSingle($identifier, $data)
	{
		
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
