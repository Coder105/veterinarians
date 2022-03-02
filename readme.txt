This simple project runs on PHP 8.1 and Laravel 9.0.2
It should work with a fresh install of Laravel 9 and running it with php artisan. The files included should then override the initial ones.
As far as the database goes, it is MySQL and the .env file can point to whatever local empty database (with credentials). "php artisan migrate" command will create all the tables from migrations included. Also, on top of the .env file I changed the app name like this: APP_NAME=Veterinarians
