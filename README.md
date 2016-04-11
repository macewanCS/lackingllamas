# lackingllamas

## Overview

This is a installation guide for a web based business plan manager. Depending on role, users can create, read, update and delete various elements of a business plan. This software was created using the Laravel PHP Framework. More information can be found here: https://github.com/laravel/framework

## Requirements

PHP 5.5.9 or greater, [Composer](https://getcomposer.org/doc/00-intro.md), and mysql.

## Installation

First, clone the repository.

    git clone https://github.com/macewanCMPT395/lackingllamas.git

Next, use composer to install all required dependencies.

    composer install

In the lackingllamas folder, create a file called **.env** and paste the following contents into it:

    APP_ENV=local
    APP_DEBUG=true
    APP_KEY=
    DB_HOST=localhost
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    CACHE_DRIVER=file
    SESSION_DRIVER=file

For the DB_DATABASE field, add the name of an empty mySQL database that will be used. Then add your username & password for mySQL to the DB_USERNAME and DB_PASSWORD fields.

Lastly, to generate an APP_KEY, run the following:

    php artisan key:generate
    
Then, to populate the database, run the following command:

    php artisan migrate --seed
    
And then, finally to run the server:

    php artisan serve

Go to localhost:8000 in any web browser to view the website. To login, you can use user BpLead@epl.ca with password: **password**, or view the file **UserSeeder.php** to see all available login information.

## License

This software was created using the Laravel PHP Framework which is under the [MIT License](https://opensource.org/licenses/MIT).
