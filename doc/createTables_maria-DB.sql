CREATE TABLE types (
type_name VARCHAR(200) PRIMARY KEY,
label VARCHAR(200)
);

CREATE TABLE gatherers (
username VARCHAR(200) PRIMARY KEY,
last_seen INTEGER DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `values` (
value_name VARCHAR(200) PRIMARY KEY,
value_comment TEXT,
timestamp INTEGER DEFAULT CURRENT_TIMESTAMP,
content BLOB,
is_standard INTEGER,
typeID VARCHAR(200) NOT NULL,
gathererID VARCHAR(200) NOT NULL,
CONSTRAINT `fk_user_values_to_type`
    FOREIGN KEY (typeID) REFERENCES types(type_name)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
CONSTRAINT `fk_user_values_to_gatherer`
    FOREIGN KEY (gathererID) REFERENCES gatherers(username)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);


