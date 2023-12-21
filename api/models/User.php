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
		
		// create user values table
		$createSQL="CREATE TABLE " . $user_id . "__values (
					value_name VARCHAR(200) PRIMARY KEY,
					value_comment TEXT,
					timestamp INTEGER DEFAULT CURRENT_TIMESTAMP,
					content BLOB,
					is_standard INTEGER,
					typeID VARCHAR(200) NOT NULL,
					gathererID VARCHAR(200) NOT NULL,
					groupID VARCHAR(200) NOT NULL,
					CONSTRAINT `fk_user_values_to_type`
						FOREIGN KEY (typeID) REFERENCES types(type_name)
						ON DELETE CASCADE
						ON UPDATE RESTRICT,
					CONSTRAINT `fk_user_values_to_groups`
						FOREIGN KEY (groupID) REFERENCES groups_universe(groupID)
						ON DELETE CASCADE
						ON UPDATE RESTRICT,
					CONSTRAINT `fk_user_values_to_gatherer`
						FOREIGN KEY (gathererID) REFERENCES gatherers(username)
						ON DELETE CASCADE
						ON UPDATE RESTRICT
					);";
		$this->api_response($this->db->query($createSQL, $params));
		
		// create user gatherer table
		$createSQL="CREATE TABLE " . $user_id . "_gatherers (
					username VARCHAR(200) PRIMARY KEY,
					last_seen INTEGER DEFAULT CURRENT_TIMESTAMP
					);";
		$this->api_response($this->db->query($createSQL, $params));
		
		// create user type table
		$createSQL="CREATE TABLE " . $user_id . "_types (
					type_name VARCHAR(200) PRIMARY KEY,
					label VARCHAR(200)
					);";
		$this->api_response($this->db->query($createSQL, $params));
	}
}
