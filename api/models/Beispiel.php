<?php

class Beispiel extends Model
{
	protected $name = 'beispiel';
	protected $id = 'pk';
	protected $searchable = ['text', 'zahl'];
	protected $insertable = ['text', 'zahl'];
}
