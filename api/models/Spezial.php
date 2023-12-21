<?php

class Spezial extends Model
{
	protected $name = 'beispiel';
	protected $id = 'pk';
	protected $searchable = ['text', 'zahl'];
	protected $insertable = ['text', 'zahl'];
	
	public function getAll($filter)
	{
		$specialSQL="SELECT (pk * zahl) AS produkt FROM beispiel";
		$query = $specialSQL;
		$this->api_response($this->db->query($query, $params));
	}
}
