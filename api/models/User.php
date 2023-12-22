<?php

class User extends Model
{
	protected $name = 'gatherer';
	protected $id = 'id';
	protected $searchable = ['username', 'last_seen'];
	protected $insertable = ['password_hash', 'username', 'mail'];

	public function createSingle($data)
	{
		// call parent function to create user
		parent::createSingle($data);

		// get id from user we just created
		$user_id = $this->db->getLastInsertId();

		// create user values table
		// $createValuesSQL = 'CREATE TABLE ' . $user_id . '_values (
		// 			value_name VARCHAR(200) PRIMARY KEY,
		// 			value_comment TEXT,
		// 			timestamp INTEGER DEFAULT CURRENT_TIMESTAMP,
		// 			content BLOB,
		// 			is_standard INTEGER,
		// 			typeID VARCHAR(200) NOT NULL,
		// 			gathererID VARCHAR(200) NOT NULL,
		// 			groupID VARCHAR(200) NOT NULL,
		// 			CONSTRAINT `fk_user_values_to_type`
		// 				FOREIGN KEY (typeID) REFERENCES types(type_name)
		// 				ON DELETE CASCADE
		// 				ON UPDATE RESTRICT,
		// 			CONSTRAINT `fk_user_values_to_groups`
		// 				FOREIGN KEY (groupID) REFERENCES groups_universe(groupID)
		// 				ON DELETE CASCADE
		// 				ON UPDATE RESTRICT,
		// 			CONSTRAINT `fk_user_values_to_gatherer`
		// 				FOREIGN KEY (gathererID) REFERENCES gatherers(username)
		// 				ON DELETE CASCADE
		// 				ON UPDATE RESTRICT
		// 			);';
		// $this->db->query($createValuesSQL);

		// create user type table
		$createTypesSQL = 'CREATE TABLE ' . $user_id . '_types (
					type_name VARCHAR(200) PRIMARY KEY,
					label VARCHAR(200)
					);';
		$this->api_response($this->db->query($createTypesSQL));
	}
	public function deleteSingle($identifier)
	{
		// call parent function to delete user
		parent::deleteSingle($identifier);

		// prevent SQL injection
		$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? OR TABLE_NAME = ? LIMIT 2;";
		// if table doesn't exist, return a 404
		if (!$this->db->query($query, [$identifier . '_types', $identifier . '_values'])) {
			$this->api_response('Item Does Not Exist', 404);
		} else {
			$deleteTypesSQL = 'DROP TABLE ' . $identifier . '_types;';
			$this->api_response($this->db->query($deleteTypesSQL));
			$deleteValuesSQL = 'DROP TABLE ' . $identifier . '_values;';
			$this->api_response($this->db->query($deleteValuesSQL));
		}
	}
}