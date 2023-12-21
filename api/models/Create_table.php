<?php

class Create_table extends Model
{
	protected $name = 'Create';
	
	public function createSingle($data) {
		$specialSQL="CREATE TABLE user (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(255) NOT NULL, password_hash varchar(255) NOT NULL)";
		$query = $specialSQL;
		$this->api_response($this->db->query($query, $params));
	}
}
