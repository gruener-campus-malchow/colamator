<?php

class Values extends ProtectedModel
{
	protected $name = 'gatherers';
	protected $id = 'username';
	protected $searchable = ['last_seen'];
	protected $insertable = ['last_seen'];
}
