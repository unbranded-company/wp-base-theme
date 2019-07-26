#!/bin/bash

docker exec db /usr/bin/mysqldump -u exampleuser --password=examplepass exampledb > backup.sql
