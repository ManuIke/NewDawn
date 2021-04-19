#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE newdawn_test;"
    psql -U postgres -c "CREATE USER newdawn PASSWORD 'newdawn' SUPERUSER;"
else
    [ "$1" = "test" ] || sudo -u postgres dropdb --if-exists newdawn
    sudo -u postgres dropdb --if-exists newdawn_test
    [ "$1" = "test" ] || sudo -u postgres dropuser --if-exists newdawn
    [ "$1" = "test" ] || sudo -u postgres psql -c "CREATE USER newdawn PASSWORD 'newdawn' SUPERUSER;"
    [ "$1" = "test" ] || sudo -u postgres createdb -O newdawn newdawn
    [ "$1" = "test" ] || sudo -u postgres psql -d newdawn -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O newdawn newdawn_test
    sudo -u postgres psql -d newdawn_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    [ "$1" = "test" ] && exit
    LINE="localhost:5432:*:newdawn:newdawn"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
