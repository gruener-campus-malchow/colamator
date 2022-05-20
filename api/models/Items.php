<?php

class Items extends Model
{
	protected $name = 'items';
	protected $id = 'id';
	protected $searchable = ['type', 'color'];
	protected $insertable = ['type', 'color'];
}
