<?php

class ProtectedModel extends Model
{

	public function call($identifier, $attribute)
	{
		if (!Auth::getUser()) return;
		parent::call($identifier, $attribute);
	}

}
