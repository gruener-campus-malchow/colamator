<?php

class DB
{

	private $connection;
	private static $singletons = [];

	public function __construct($path)
	{
		if (!array_key_exists($path, self::$singletons))
		{
			try
			{
				$this->singletons[$path] = new PDO("sqlite:$path");
			}
			catch (PDOException $e)
			{
				if (ENV == 'DEV') echo 'Connection failed: ' . $e->getMessage();
				return;
			}
		}

		$this->connection = self::$singletons[$path];
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
		if (!isset($this->connection)) return false;

		$id = $this->connection->lastInsertId();
		if (is_numeric($id)) $id = $id + 0;
		return $id;
	}

}
