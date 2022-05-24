<?php

class Devices extends ProtectedModel
{
	protected $name = 'devices';
	protected $id = 'name';
	protected $searchable = ['last_used', 'device_id'];
	protected $insertable = ['name', 'last_used', 'device_id'];
}
