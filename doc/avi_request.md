| Request             | Method | Sql-Query                                      | 
|---------------------|--------|------------------------------------------------|
| /api/datatypes/     | GET    | SELECT * FROM datatypes                        |   
|                     | POST   | INSERT INTO datatypes VALUES                   |   
| /api/datatypes/1typ | DELETE | DELETE * FROM datatyp Where name = 1typ        |   
| /api/messages/      | GET    | SELECT * FROM messages                         |   
|                     | POST   | INSERT INTO messages VALUES                    |   
| /api/messages/1msg  | PATCH  | UPDATE messages SET ...=...  Where name = 1msg |   
|                     | DELETE | DELETE * FROM messages Where name = 1msg       |  
| /api/groups/        | POST   | INSERT INTO groups VALUES                      |   
| /api/groups/1group  | PATCH  | UPDATE groups SET ...=...  Where name = 1group |  
| /api/groups/1group  | DELTE  | DELETE * FROM groups Where name = 1group       |   
