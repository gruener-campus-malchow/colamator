<?php

class User extends Model
{
	protected $name = 'user';
	protected $id = 'id';
	protected $searchable = ['username'];
	protected $insertable = ['password_hash', 'username'];
	
	public function createSingle ($data)
	{
		// call parent function to create user
		parent::createSingle($data);
		
		// get id from user we just created
		$user_id = $this->db->getLastInsertId();
		
		// create user data table
		$createSQL="CREATE TABLE " . $user_id . "_data (id_msg INT PRIMARY KEY AUTO_INCREMENT, timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, data BLOB, datatype_fk INT, group_fk INT, sender_fk INT, comment varchar(255))";
		$this->api_response($this->db->query($createSQL, $params));
	}
}
