# Project: Dungeon Backroom

A dungeon and dragons utility to track items and item weights.

## Installation - Development

### Setup a clean Database

Make sure mysql (or some variant database) is installed 
via ```mysql --version```. If it doesn't exist then install it via...
* ```sudo apt update && sudo apt install mysql-server``` (Ubuntu)

Then access your mysql database via ```sudo mysql -u root```.

Choose a ```<DATABASE_NAME>``` for the new database and a ```<USERNAME>``` and ```<PASSWORD>``` that will be used to access the new database.

Afterwards you can create both the database and user that will access it...
1. ```CREATE DATABASE <DATABASE_NAME>;```
2. ```CREATE USER '<USERNAME>'@'localhost' IDENTIFIED BY '<PASSWORD>';```
3. ```GRANT ALL PRIVILEGES ON <DATABASE_NAME>.* TO '<USERNAME>'@'localhost';```
4. ```FLUSH PRIVILEGES;```

_Note_: Using ```sudo``` is never a good default course of execution. Create a user that corresponds with the user name you logged into your computer with and supply it a solid password. Give it admin privileges and use it as your master user. Using step ```2``` and below, you can achieve this be replacing ```<DATABASE_NAME>``` with ```*```. Just be sure that the master user and the user the project is using are seperate.

### Install additional PHP Extensions

Check wether you have PHP installed via ```php --version```. If it doesn't exist then install it via...
* ```sudo apt update && sudo apt install php``` (Ubuntu)

Install the following PHP extensions to support laravel...
* ```php-bcmath```
* ```php-ctype```
* ```php-json```
* ```php-mbstring```
* ```php-pdo```
* ```php-tokenizer```
* ```php-xml```

### Setup the project in a Development Environment

In the projects main directory download dependencies and create an environment file...
1. ```composer install```
2. ```yarn``` or ```npm install```
3. ```cp .env.example .env```

In ```.env``` set the ```DB``` variables to the earlier specified ```<DATABASE_NAME>```, ```<USERNAME>```, and ```<PASSWORD>```...
* ```DB_DATABASE``` as ```<DATABASE_NAME>```
* ```DB_USERNAME``` as ```<USERNAME>```
* ```DB_PASSWORD``` as ```<PASSWORD>```

Generate an app key via ```php artisan key:generate```.
