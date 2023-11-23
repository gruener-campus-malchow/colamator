---

type: slide

---

# DIE Benutzung

... in k Schritten

---

### in /models eine neue Model-Klasse erstellen

```php=
class Superbeispiel extends Model
{

}
```

---

### Meta-informationen hinzufügen

```php=
//name of db-table
protected $name = 'beispiel'; 
//name of primary key
protected $id = 'pk';
//list of filterable attributes
protected $searchable = ['text', 'zahl'];
//list of writeable attributes
protected $insertable = ['text', 'zahl'];
```

---

### Test ``getAll()`` mit RESTer

![image](https://hackmd.io/_uploads/rkoRo93NT.png)

----

### Test ``getSingle()``

![image](https://hackmd.io/_uploads/S1BiAc2Np.png)

---

### Out of the box

DIE entscheidet nach HTTP-Methode:

```php=
// returns a list of all elements, 
// can be filtered by attributes, via GET
public function getAll($filter) {}

// returns a complete element, 
// identified by primary key, via GET
public function getSingle($identifier) {}

// creates *one* element, 
// expects JSON, via POST
public function createSingle($data) {}
```

----

### ... Out of the box

```php=
// updates *one* element, 
// identified by primary key, expects JSON, via POST
public function updateSingle($identifier, $data) {}

// replaces *one* element, 
// identified by primary key, expects JSON, via PUT
public function replaceSingle($identifier, $data) {}

// deletes *one* element, 
// identified by primary key, via DELETE
public function deleteSingle($identifier) {}
```

---

### Besondere Fälle

insbesondere:

- komplexe Queries
- über mehrere Tabellen

----

#### boxed Methode überschreiben

```php=
class Spezial extends Model {
 protected $name = 'beispiel';
 protected $id = 'pk';
 public function getAll($filter) {
  $specialSQL="SELECT (pk * zahl) 
                AS produkt FROM beispiel";
  $query = $specialSQL;
  $this->api_response($this->db->query($query, $params));
  }
}
```

---

<div class=r-fit-text>Have a lot of fun!</div>

<div class=small>... while debugging</div>