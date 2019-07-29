WP Base Theme (for Docker)
===

This repository contain the basic code to set up docker containers able to run a WordPress website, a mysql database and the phpMyAdmin administrator. 


## Run docker compose

1.  Run the following command in the root of the directory to install all the images and run the containers.

```sh
$ docker-compose up -d
```


### WordPress

Visit `http://127.0.0.1:8080` to access the wordpress website after starting the containers.

### phpMyAdmin

Visit `http://127.0.0.1:3333` to access phpMyAdmin after starting the containers.

The default username is root, and the password is the same as supplied in the `.env` file.

### db-manage

The db-manage.sh script allow you to export and import the database. After you export the database, you can find a copy in `data/backup.sql`
