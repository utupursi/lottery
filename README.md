## Prerequisites
- PHP >= 7.3
- Composer
- Database

## Install Dependecies
>composer install

## Environment configuration
Duplicate the __.env.example__ file and rename it to __.env__.
Update the database configuration in the __.env__ file with your database credentials.

## Database 
Run the following command to migrate the database:
>php artisan migrate

## Database Seeding
If you want to seed the database with sample data, run:
>php artisan db:seed

## Generate users
Run the following command to generate users (__It may take a while__):
>php artisan command:generate-users

## Run Application
Type the following command to run laravel application locally
>php artisan serve


