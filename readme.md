# Laravel Application with Secure API using Passport (oAuth2 protocol)

> ### Laravel application developed by [Rafael Calhau](https://calhau.me).


----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.7/installation#installation)


1. Clone the project

        git clone https://github.com/rafaelcalhau/laravel-oauth2-api.git my-laravel-app 

2. Switch to the repo folder

        cd my-laravel-app

3. Install all the dependencies using composer

        composer install

4. Create the MySQL Database and MySQL User for this application

5. Copy the .example.env file to .env and change the database name and credentials

        cp .env.example .env

6. Generate a new application key

        php artisan key:generate

7. Run the database migrations (**Set the database connection in .env before migrating**)

        php artisan migrate

8. Run the Passport Installer:

        php artisan passport:install --force 

9. Start the local development server

        php artisan serve --host=localhost

    You can now access the server at http://localhost:8000


10. Create a user

        http://localhost:8000/register
        

     ***Note*** :  Once logged out, you still can use this URL for signing in again: http://localhost:8000/login


## Compiling Assets

There are some functionalities built with ECMAScript 6 and in case you need to change something on CSS or JS files, you'll need to have nodejs installed on your machine and then run npm install and to recompile the assets. So, you can use Laravel Mix:

        npm install
        npm run dev (in development mode)
        npm run prod (for production)

## API Specification

In order to use the API, you will need generate your authorization access token by logging in using your user and following the instructions on dashboard page. Once having a valid Access Token, you can retrieve data from API passing it on header by setting the Authorization parameter.

----------

## Dependencies

- [laravel-passport](https://github.com/laravel/passport) - For API authentication using OAuth2

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `extras` - Contains all the xml files for testing the upload
- `resources/css` - Contains custom css files
- `resources/js/uploader` - Contains custom JS/ES6 files
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests
- `tests/Feature/Api` - Contains all the api tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing the upload
You'll need follow this sequence:

- Navigate to http://localhost:8000/
- Upload the people.xml file
- Upload the shiporders.xml file

# Testing API

Run the laravel development server

    php artisan serve --host=localhost

The api can now be accessed at

    http://localhost:8000/api/people
    http://localhost:8000/api/order

**Note** : It's needed you to have an access token and put it on your Header request, using the parameter "Authorization". Once logged in, you will find at dashboard page a form. You can create your access token filling out the form with your password.

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Accept     	        | application/json 	|
| Yes 	        | Authorization    	| Bearer Access Token   |
