#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U newdawn -d newdawn < $BASE_DIR/newdawn.sql
    if [ -f "$BASE_DIR/newdawn_test.sql" ]; then
        psql -h localhost -U newdawn -d newdawn < $BASE_DIR/newdawn_test.sql
    fi
    echo "DROP TABLE IF EXISTS migration CASCADE;" | psql -h localhost -U newdawn -d newdawn
fi
psql -h localhost -U newdawn -d newdawn_test < $BASE_DIR/newdawn.sql
echo "DROP TABLE IF EXISTS migration CASCADE;" | psql -h localhost -U newdawn -d newdawn_test
