CREATE TABLE types (
	'name' TEXT PRIMARY KEY,
	label TEXT
);

CREATE TABLE gatherers (
	username TEXT PRIMARY KEY,
	last_seen INT DEFAULT CURRENT_TIMESTAMP,
	hash TEXT NOT NULL
);

CREATE TABLE 'values' (
	'name' TEXT PRIMARY KEY,
	'comment' TEXT,
	timestamp INTEGER DEFAULT CURRENT_TIMESTAMP,
	content BLOB,
	is_standard INTEGER,
	typeID TEXT NOT NULL,
	gathererID TEXT NOT NULL,
	FOREIGN KEY (typeID) REFERENCES types(name),
	FOREIGN KEY (gathererID) REFERENCES gatherers(username)
);

CREATE TABLE 'devices' (
	'name' TEXT PRIMARY KEY,
	last_used INTEGER DEFAULT CURRENT_TIMESTAMP,
	DeviceID TEXT NOT NULL
);
