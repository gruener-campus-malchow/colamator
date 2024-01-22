CREATE TABLE typ (
type_name VARCHAR(200) PRIMARY KEY,
label VARCHAR(200)
);

CREATE TABLE gatherer (
username VARCHAR(200) PRIMARY KEY,
last_seen INTEGER DEFAULT CURRENT_TIMESTAMP,
mail VARCHAR(200),
password_hash,
);

CREATE TABLE 'value' (
value_comment TEXT,
timestamp INTEGER DEFAULT CURRENT_TIMESTAMP PRIMARY KEY,
content BLOB,
is_standard BOOLEAN,
typeID VARCHAR(200) NOT NULL,
gathererID VARCHAR(200) NOT NULL,
groupID CHAR(16) NOT NULL,
CONSTRAINT `fk_user_values_to_type`
    FOREIGN KEY (typeID) REFERENCES types(type_name)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
CONSTRAINT `fk_user_values_to_groups`
    FOREIGN KEY (groupID) REFERENCES groups_universe(groupID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
CONSTRAINT `fk_user_values_to_gatherer`
    FOREIGN KEY (gathererID) REFERENCES gatherers(username)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);

CREATE TABLE 'group' (
name VARCHAR(200) NOT NULL,
description TEXT,
pk_64 CHAR(16) PRIMARY KEY,
);


