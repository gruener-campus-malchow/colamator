<?php

class Tables extends Model
{
	protected $name = 'tables';
	public function getAll($filter)
	{
		$specialSQL="SHOW TABLES;";
		$query = $specialSQL;
		$this->api_response($this->db->query($query, $params));
	}
	public function getSingle($identifier) {
		$specialSQL="SELECT * FROM" . $identifier . ";";
		$query = $specialSQL;
		$this->api_response($this->db->query($query, $params));
	}
}
