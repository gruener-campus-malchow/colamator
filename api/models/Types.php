<?php

class Values extends ProtectedModel
{
	protected $name = 'types';
	protected $id = 'name';
	protected $searchable = ['label'];
	protected $insertable = ['label'];
}
