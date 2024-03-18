CREATE TABLE types (
name TEXT PRIMARY KEY,
label TEXT
);

CREATE TABLE gatherers (
username TEXT PRIMARY KEY,
last_seen INT DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE "values" (
name TEXT PRIMARY KEY,
comment TEXT,
timestamp INTEGER DEFAULT CURRENT_TIMESTAMP,
content BLOB,
is_standard INTEGER,
typeID TEXT NOT NULL,
gathererID TEXT NOT NULL,
FOREIGN KEY (typeID) REFERENCES types(name),
FOREIGN KEY (gathererID) REFERENCES gatherers(username)
);

