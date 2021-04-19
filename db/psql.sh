#!/bin/sh

[ "$1" = "test" ] && BD="_test"
psql -h localhost -U newdawn -d newdawn$BD
