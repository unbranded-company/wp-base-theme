#!/bin/bash

source .env
export $(cut -d= -f1 .env)

read -p "Database export or import? [e/i]: " answer
if [[ $answer = e ]] ; then
    docker exec db /usr/bin/mysqldump -u root --password=${DB_ROOT_PASSWORD} ${DB_NAME} > data/backup.sql
elif [[ $answer = i ]] ; then
  cat data/backup.sql | docker exec -i db /usr/bin/mysql -u root --password=${DB_ROOT_PASSWORD} ${DB_NAME}
fi

