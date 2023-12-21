<?php

class Tables extends Model
{
	protected $name = 'tables';
	public function getAll($filter)
	{
		$query="SHOW TABLES;";
		$this->api_response($this->db->query($query, $params));
	}
	public function getSingle($identifier) {
		// prevent SQL injection
		$pattern = "\b(ALTER|CREATE|DELETE|DROP|EXEC(UTE){0,1}|INSERT( +INTO){0,1}|MERGE|SELECT|UPDATE|UNION( +ALL){0,1})\b";
		if (preg_match($pattern, $identifier)) {
			http_response_code(403);
			die("Be a nice person, don't inject SQL");
		}
		// build query
		$query="SELECT * FROM " . $identifier . ";";
		$result = $this->db->query($query, $params)
		// if table doesn't exist, return a 404
		if (!$result) $this->api_response('Item Does Not Exist', 404);
		// else return the item; [0] is needed since DB::query() returns the element wrapped in an array
		else $this->api_response($result[0]);
	}
}
