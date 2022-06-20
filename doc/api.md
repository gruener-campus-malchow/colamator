# API

Wir haben das Design von einem klassischen MVC-Ansatz hin zu einem API-Design entwickelt. Der Grund ist, dass wir von Beginn an verschiedene Frontends entwickeln: Eine WebApp, die v.a. mit Push-Nachrichten eine Benutzerfreundlichkeit ähnlich eines üblichen Messengers erreicht, und eine klassische PHP-Seite, die zunächst Backend-Aufgaben erfüllt und vor allem für das Testen zuständig ist.

Eine API erlaubt außerdem, dass zukünftig weitere Dienste, wie z.B. eine Wetterstation, einbinden können.

## API Endpoints

### GET /api/users/

Listet alle ~~user~~ gatherer

### POST /api/users/

erzeugt einen neuen ~~user~~ gatherer

body: `{"password":"strenggeheim", "username":"maxmustermann"}` \
response: `"username missing"` oder `"password missing"` oder `"Username already exists"` oder `"user created"`

### POST /api/users/login

loggt einen benutzer ein

body: `{"password":"strenggeheim", "username":"maxmustermann"}` \
response: `"username missing"` oder `"password missing"` oder `"login successful"` oder `"login failed"`

### POST /api/users/logout

loggt einen benutzer aus

response: `"logout successful"`

### GET /api/datatypes/ [R]

Liefert Datentypen, die für einen Benutzer festegelegt sind

response: `[{…}, …]`

### GET /api/devices/ [R]

Liefert Devices, die für einen Benutzer festegelegt sind

response: `[{…}, …]`

### POST /api/devices/ [R]

hinterlegt pro benutzer einen device-key für push-notifikationen

body: `{"device_id":"sdfg","name":"my device"}` \
response: `0` bei Fehlern, sonst den Index (A_I) des devices

**[R] nur für angemeldete user verfügbar**
