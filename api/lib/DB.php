<?php

class DB
{

	private $connection;


	//public function __construct($host, $username, $password, $database)
	public function __construct()
	{
		try
		{
			$this->connection = new PDO("sqlite:db/database.sqlite");
		}
		catch (PDOException $e)
		{
			if (ENV == 'DEV') echo 'Connection failed: ' . $e->getMessage();
		}
	}


	public function query($query, $values = [], $fetchMode = PDO::FETCH_ASSOC)
	{
		if (!isset($this->connection)) return false;

		$statement = $this->connection->prepare($query);

		foreach ($values as $key => $value)
		{
			$statement->bindValue($key + 1, $value);
		}

		if ($statement->execute())
		{
			return $statement->fetchAll($fetchMode);
		}
		elseif (ENV == 'DEV')
		{
			return $statement->queryString;//$statement->errorInfo();
		}
		return false;
	}


	public function getLastInsertId()
	{
		$id = $this->connection->lastInsertId();
		if (is_numeric($id)) $id = $id + 0;
		return $id;
	}

}
