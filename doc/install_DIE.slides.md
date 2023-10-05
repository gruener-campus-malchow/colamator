# Schritt 1

- .htacces
- config.php

jeweils den basepath angepasst

Datenbankzugangsdaten in config.php eingetragen


# Schritt 2

Beispieldatenbank erstellt

```sql
CREATE TABLE `beispiel` (
  `pk` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `zahl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO `beispiel` (`pk`, `text`, `zahl`) VALUES
(1, 'Hallo Welt', 3142),
(2, 'Hello World', 2413);
```


# Schritt 3

Model erstellt, das die volle Automation nutzt: CRUD

```php
class Beispiel extends Model
{
	protected $name = 'beispiel';
	protected $id = 'pk';
	protected $searchable = ['text', 'zahl'];
	protected $insertable = ['text', 'zahl'];
}
```


# Troubleshooting

NEVER FORGET THE SLASH: ... / beispiel **/**

```php
Malformed URL: Accessing List As Object
```

![](https://cdn.pnghd.pics/data/1781/head-desk-gif-8.gif)



# CRUD in DIE
```php
public function getAll($filter){}
public function getSingle($identifier){}
public function getAttribute($identifier, $attribute){}
public function createSingle($data){}
public function updateSingle($identifier, $data){}
public function replaceSingle($identifier, $data){}
public function deleteSingle($identifier){}
```


# Schritt 4

Spezialmodell erstellt, das das **Überschreiben** von Methoden zeigt
```php
class Spezial extends Model
{
	protected $name = 'beispiel';
	protected $id = 'pk';
	protected $searchable = ['text', 'zahl'];
	protected $insertable = ['text', 'zahl'];
	
	public function getAll($filter)
	{
		$specialSQL="SELECT (pk * zahl) AS produkt FROM beispiel";
		$query = $specialSQL;
		$this->api_response($this->db->query($query, $params));
	}
}
```
