	| Request                          | Methode | SQL-Query                                                             |
|------------------------------------------|---------|-----------------------------------------------------------------------|
| /api/{modelName}/{recordId}/delete       | DELETE  | DELETE FROM {modelName} WHERE id = {recordId}                         |
| /api/{modelName}/all                     | GET     | SELECT * FROM {modelName}                                             |
| /api/config                              | GET     | SELECT * FROM config                                                  |


* 1)Mit diesem Request wird ein Datensatz in der Tabelle {modelName} anhand seiner ID gelöscht. *
* 2)Dieser Request gibt alle Datensätze aus der Tabelle {modelName} zurück. *
* 3)Mit diesem Request können Konfigurationsdaten abgerufen werden. *