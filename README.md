# colamator
Colaborative Measurement Network

## Ziele

* Eine (Traininigs-) Gruppe erhebt gemeinsam Daten und postet die in einem fortlaufenden Chat
* Beispiele: 
  * Anzahl Wiederholungen von Übungen
  * Körpergewicht
  * Kalorien
  * Trinkmenge
* Die Werte haben immer einen Datentyp und werden auch so strukturiert verarbeitet
* Ein Standard-Datentyp ist "Bullshit" - ein anderer Datentyp ist "Foo"
* Teilnehmer*innen können entscheiden, wie öffentlich sie ihre Werte posten
* Es gibt private Auswertungen (Grafiken)
* Es gibt Auswertungen über die Gruppe
* Es können Ziele definiert werden
* Wichtig sind Notifikationen an das Smartphone (WebApp?)
* Andere Szenarien:
  * Eine Schulklasse misst Temperaturen, Sonnenuntergang, die Zeit zum Zähneputzen
  * Ein Physikkurs erhebt Zeitmessungen an einem Fadenpendel
  * Ein Bot registriert das Erscheinen von Personen
  * Bei einer Veranstaltung (z.B. HackN8) wird die Menge an Süßigkeiten gemessen
  * Eine Kontrollgruppe erhebt die Zeit, die man für Hausuafgaben benötigt
* Es muss einen Datenexport geben in:
  * JSON
  * CSV

## Architektur

* möglichst dezentral
* für alle Skills Beteiligung möglich
* diverse Datenbanken
  * SQLITE
  * Je Benutzer eine (Idee: Eigene Datenanfragen möglich)
  * Für Collaboration/Chat eine
  * Merging?
  
 ## ERM
 
 ~~~dot
  graph ER {
	
	layout=neato;
	 //overlap = scale;
	 overlap = false;
	
	node [shape=box]; types; values; gatherer;

	node [shape=ellipse];  name0; name1; username; label; comment; string; integer; float; timestamp; status;

	node [shape=diamond,style=filled,color=lightgrey] {"classifies";} 

	name0 -- types;
	label -- types;
	name0 [label=<<u>name</u>>];
	
	name1 -- values;
	string -- values;
	integer -- values;
	float -- values;
	timestamp -- values;
	comment -- values;
	name1 [label=<<u>name</u>>];
	timestamp [label=<<u>timestamp</u>>];
	
	username -- gatherer;
	status -- gatherer;
	username [label=<<u>username</u>>];
	status [label="last seen"];

	types -- "classifies" [label="1",len=1.00];
	values -- "classifies" [label="n",len=1.00];
	
	types -- "references" [label="1",len=1.00];
	values -- "references" [label="n",len=1.00];
	
	gatherer -- "gathers" [label="1",len=1.00];
	values -- "gathers" [label="n",len=1.00];

	label = "\n\nUSER DATABASE\nCollaborative Measurement Network";
	fontsize=14;
}
~~~

# MVC-Adaption

~~~dot
digraph G {
  graph [fontname = "Handlee"];
  node [fontname = "Handlee"];
  edge [fontname = "Handlee"];

  bgcolor=transparent;

  subgraph cluster_0 {
    style=filled;
    color=lightgrey;
    node [style=filled,color=pink];
    c0; 
    label = "*controller*";
    fontsize = 20;
  }

  subgraph cluster_1 {
    node [style=filled];
    m0;
    m1;
    m2;
    m3;
    m4;
    m5;
    label = "*/models*";
    fontsize = 20;
    color=green
  }
  
  subgraph cluster_2 {
    node [style=filled];
    v0;
    v1;
    v2;
    v3;
    v5;
    label = "*/views*";
    fontsize = 20;
    color=blue
  }
  
    subgraph cluster_3 {
    node [style=filled];
    u0;
    u1;
    u2;
    
    label = "*sqlite*";
    fontsize = 20;
    color=red
  }
  
  start -> c0;
  c0 -> start;
  

  m0 -> v0;
  v0 -> c0;
  
  c0 -> m1;
  m1 -> v1;
  v1 -> c0;
  
  c0 -> m2;
  m2 -> v2;
  v2 -> c0;
  
  c0 -> m3;
  m3 -> v3;
  v3 -> c0;
  
  c0 -> m5;
  m5 -> v5;
  v5 -> c0;
  
  start [shape=Mdiamond, label="http"];
 
  c0 [label="index.php"]
  
  m0 [label="Menu.php"]
  m1 [label="Chat.php"]
  m2 [label="Charts.php"]
  m3 [label="Settings.php"]
  m4 [label="UserData.php"]
  m5 [label="UserSQL.php"]
  
  v0 [label="Menu.php"]
  v1 [label="Chat.php"]
  v2 [label="Charts.php"]
  v3 [label="Settings.php"]
  v5 [label="UserSQL.php"]
  
  u0 [shape=cylinder, label="Bob's DB"];
  u1 [shape=cylinder, label="Alices's DB"];
  u2 [shape=cylinder, label="Eve's DB"];
  
  m0 -> m4 -> m0;
  m1 -> m4 -> m1;
  m2 -> m4 -> m2;
  m3 -> m4 -> m3;
  m5 -> m4 -> m5;
  
  u0 -> m4 -> u0;
  u1 -> m4 -> u1;
  u2 -> m4 -> u2;
  
  c0 -> m4 [label="authentication"]
  m4 -> c0 [label="authorisation"]
  
  
}
~~~
