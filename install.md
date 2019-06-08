		  ## Installation

    This __currently__ new rewrite of Blind Computing is built on the laravel framework, so you must have php, mysql, composer and nodejs installed on the target system. Then its a simple case of:

* Cloneing this repository:

    git clone https://githubcom/blind-computing/blind-computing.git <dirname> --branch=laravel-rewrite

* Then running:

    composer install

This installs all required PHP dependencies.

* Then installing the npm dependencies:

    npm install

* Next, copying the example env file:

    cp .env.example .env

* Editing this file and adding your database credentials, then running the next command to generate an application key

    php artisan key:generate

* Changing the  documentRoot of your web server to point to the public directory.

  You'll also need to run the database migrations to create the necessary tables. To do this, create a mysql
database, point to it in your .env and add your mysql credentials here as well, then from a terminal, in the
root of the project's directory, run:

    php artisan migrate

