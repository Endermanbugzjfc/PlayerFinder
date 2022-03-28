-- #!sqlite
-- #{ table
-- #	{ player
CREATE TABLE IF NOT EXISTS playerfinder_player(
	uuid BINARY(16) NOT NULL,
	name VARCHAR NOT NULL,

	PRIMARY KEY (uuid)
);
-- #	}
-- #}