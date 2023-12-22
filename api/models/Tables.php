<?php

class Tables extends Model
{
	protected $name = 'tables';
	public function getAll($filter)
	{
		$query = "SHOW TABLES;";
		$this->api_response($this->db->query($query));
	}
	public function getSingle($identifier)
	{
		// // prevent SQL injection
		$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? LIMIT 1;";
		// if table doesn't exist, return a 404
		if (!$this->db->query($query, [$identifier])) {
			$this->api_response('Item Does Not Exist', 404);
		} else {
			// build query
			$query = "SELECT * FROM $identifier;";
			// return the item; [0] is needed since DB::query() returns the element wrapped in an array
			$this->api_response($this->db->query($query));

		}
	}
}
