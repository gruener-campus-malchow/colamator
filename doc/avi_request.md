| Request             | Method | Sql-Query                                      | 
|---------------------|--------|------------------------------------------------|
| /api/datatypes/     | GET    | SELECT * FROM datatypes                        |   
|                     | POST   | INSERT INTO datatypes VALUES                   |   
| /api/datatypes/1typ | DELETE | DELETE * FROM datatyp Where name = 1typ        |   
| /api/values/      | GET    | SELECT * FROM values                         |   
|                     | POST   | INSERT INTO values VALUES                    |   
| /api/values/1value  | PATCH  | UPDATE values SET ...=...  Where name = 1value |   
|                     | DELETE | DELETE * FROM values Where name = 1value     |  
| /api/groups/        | POST   | INSERT INTO groups VALUES                      |   
| /api/groups/1group  | PATCH  | UPDATE groups SET ...=...  Where name = 1group |  
| /api/groups/1group  | DELTE  | DELETE * FROM groups Where name = 1group       |   
