# API

Wir haben das Design von einem klassischen MVC-Ansatz hin zu einem API-Design entwickelt. Der Grund ist, dass wir von Beginn an verschiedene Frontends entwickeln: Eine WebApp, die v.a. mit Push-Nachrichten eine Benutzerfreundlichkeit ähnlich eines üblichen Messengers erreicht, und eine klassische PHP-Seite, die zunächst Backend-Aufgaben erfüllt und vor allem für das Testen zuständig ist.

Eine API erlaubt außerdem, dass zukünftig weitere Dienste, wie z.B. eine Wetterstation, einbinden können.

## API Endpoints

### POST

#### /api/users/datatypes

Liefert Datentypen, die für einen Benutzer festegelegt sind

body: {"username":"maxmustermann"}
response: {...}

#### /api/users/

erzeugt einen neuen user

body: {"password":"strenggeheim", "username":"maxmustermann"}
response: {...}

#### /api/users/login

loggt einen benutzer ein

body: {"password":"strenggeheim", "username":"maxmustermann"}
response: {...}

#### /api/users/add_device_key

hinterlegt pro benutzer einen device-key für push-notifikationen

body: {"username":"maxmustermann","device_key":"sdfg","device_name":"my "}
response: {...}

### GET

