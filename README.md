# Shoppers
A shopping list application for those who love shopping. It helps keeping track of a shopper's list of items

# DoofRestfulApi

This is an API version 1.0 for the shoppinglist api called "shoppers" designed using the lumen microframework in php

### Live demo
[https://doofrecipeapi.herokuapp.com/apidocs](https://doofrecipeapi.herokuapp.com/apidocs)


### Set Up
You should have [git](https://git-scm.com/), [php](http://www.php.net/), [composer](https://getcomposer.org/), [postgresql](https://www.postgresql.org/)installed
##### These instructions are specific to a linux, macOS or and windows based machine
1. Open your terminal/commandline
2. Clone the project using `git clone https://github.com/sebuliba-adrian/shoppers-server`
3. Change to the project directory using `cd shoppers-server`
4. Install dependencies using `composer install`
6. To launch the application you should first apply migrations in order to create the database whose process is shown below
7. Run the application using `php -S localhost:8000 -t public`
8. You can access the api documentation at 
`coming soon`


### Setup Database:

Install postgres: ```brew install postgresql```

1. ```Type psql in terminal.```

2. ```On postgres interactive interface, type CREATE DATABASE develop_db;```

### Setup .env file:

### Command for  applying migrations to database

```sh
$ php artisan migrate
```

### Run the server
 ```php -S localhost:8000 -t public```


### Specifications for the API are shown below

| EndPoint | Functionality | Public Access |
| -------- | ------------- | ------------- |
| [ POST /auth/login ](#) | Logs a user in | TRUE |
| [ POST /auth/register ](#) | Register a user | TRUE |
| [ POST /auth/logout ](#) | Logs a user out | FALSE |
| [ POST /categories/ ](#) | Create a new category list | FALSE |
| [ GET /categories/ ](#) | List all the created categories | FALSE |
| [ GET /categories/\<category_id> ](#) | Get single category | FALSE |
| [ PUT /categories/\<category_id> ](#) | Update this category | FALSE |
| [ DELETE /categories/\<category_id> ](#) | Delete this single category | FALSE |
| [ POST /categories/\<category_id>/recipes ](#) | Create a new item category | FALSE |
| [ PUT /categories/\<category_id>/items/<item_id> ](#) | Update an item | FALSE |
| [ DELETE /categories/\<category_id>/items/<item_id> ](#) | Delete an item in a category | FALSE |

Others specs coming soon. Enjoy
