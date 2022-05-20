<?php

class Users extends Model
{
	protected $name = 'users';
	protected $id = 'id';
	protected $searchable = ['names', 'salt'];
	protected $insertable = ['names', 'salt'];
}
