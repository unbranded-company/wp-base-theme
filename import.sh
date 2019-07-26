#!/bin/bash

cat backup.sql | docker exec -i db /usr/bin/mysql -u exampleuser --password=examplepass exampledb
