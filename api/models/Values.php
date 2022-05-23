<?php

class Values extends ProtectedModel
{
	protected $name = 'values';
	protected $id = 'name';
	protected $searchable = ['comment', 'timestamp', 'is_standard', 'type_id', 'gatherer_id'];
	protected $insertable = ['name', 'comment', 'timestamp', 'content', 'is_standard', 'type_id', 'gatherer_id'];
}
