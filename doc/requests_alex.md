| Request     | Methode | SQL-Query           |
|-------------|---------|---------------------|
| /api/items/ | GET     | SELECT * FROM items |
| ...         | POST    | ...                 |

| **Request**                          | **Method** | **SQL**                                                                                   |
|--------------------------------------|------------|-------------------------------------------------------------------------------------------|
| /api/user/                           | GET        | SELECT * FROM user;                                                                       |
| /api/user/username                   | GET        | SELECT * FROM user WHERE username="username";                                             |
| /api/datatypes/                      | GET        | SELECT * FROM datatypes;                                                                  |
| /api/datatypes/name                  | GET        | SELECT * FROM datatypes WHERE name="name";                                                |
| /api/collaborations/                 | GET        | SELECT * FROM collaborations;                                                             |
| /api/collaborations/hash             | GET        | SELECT * FROM collaborations WHERE id="hash";                                             |
| user@example.com/api/collaborations/ | POST       | INSERT INTO collaborations (name,description, picture) VALUES (name,description,picture); |
| /gatherers/1 | ```GET```    | ```SELECT * FROM gatherers WHERE id=1;```               |
| /gatherers/1 | ```PATCH```  | ```INSERT value_to_change INTO gatherers WHERE id=1;``` |
| /groups/     | ```GET```    | ```SELECT * FROM groups;```                             |
| /groups/     | ```POST```   | ```INSERT INTO groups VALUES;```                        |
| /datatypes/  | ```GET```    | ```SELECT * FROM datatypes;```                          |
| /datatypes/  | ```POST```   | ```INSERT INTO datatypes VALUES;```                     |
