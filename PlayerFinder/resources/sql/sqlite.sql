-- #!sqlite
-- #{ table
-- #	{ player
CREATE TABLE IF NOT EXISTS playerfinder_player(
	uuid BINARY(16) NOT NULL,
	name VARCHAR NOT NULL,
	same_page_for_search_bar_and_selector BOOLEAN NOT NULL,

	PRIMARY KEY (uuid)
);
-- #	}
-- #	{ player_favourite_action
CREATE TABLE IF NOT EXISTS playerfinder_player_favourite_action(
	uuid BINARY(16) NOT NULL,
	index BOOLEAN NOT NULL, -- Unsigned tinyint equivalent in SQLite. 256 actions should be enough.
	action VARCHAR NOT NULL,

	PRIMARY KEY (uuid, action)
);
-- #	}
-- #}