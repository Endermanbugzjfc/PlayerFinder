-- #!sqlite
-- #{ table
-- #	{ player
CREATE TABLE IF NOT EXISTS playerfinder_player(
	uuid BINARY(16) NOT NULL PRIMARY KEY,
	name VARCHAR NOT NULL
);
-- #	}
-- #}