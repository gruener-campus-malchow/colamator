| Request      | Method | SQL                                               |
|--------------|--------|---------------------------------------------------|
| /gatherers/1 | ```GET```    | ```SELECT * FROM gatherers WHERE id=1;```               |
| /gatherers/1 | ```PATCH```  | ```INSERT value_to_change INTO gatherers WHERE id=1;``` |
| /groups/     | ```GET```    | ```SELECT * FROM groups;```                             |
| /groups/     | ```POST```   | ```INSERT INTO groups VALUES;```                        |
| /datatypes/  | ```GET```    | ```SELECT * FROM datatypes;```                          |
| /datatypes/  | ```POST```   | ```INSERT INTO datatypes VALUES;```                     |
