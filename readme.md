# Phonebook App

## Installation

1. Git clone this repo or download and unzip the tarball
2. Next create a copy of .env.example and name it .env
3. Update the content of the .env file setting your database credentials
4. In terminal, navigate to the root folder and:

    4.1 Run `composer install`

    4.2 Generate a unique hashing key by running `php artisan key:generate`
    
    4.3 Confirm installed ok by running `./vendor/bin/phpunit`
    
    4.4 Build the database by running `php artisan migrate` 
    
    4.5 Create dummy data by running `php artisan db:seed`
    
    4.6 Run `php artisan serve` to serve the application for browser viewing
    
    
## Features

1. Authentication
2. Basic Contacts CRUD
3. Contact Search

## Contributing

1. Git clone
2. Confirm everything works by running `./vendor/bin/phpunit`
3. Always write tests for every new feature added

