<?php

class ProtectedModel extends Model
{

	public function call($identifier, $attribute)
	{
		if (!Auth::getUser()) return $this->api_response('Forbidden', 403);
		parent::call($identifier, $attribute);
	}

}
