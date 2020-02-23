# Soccer Field Management System

## Installation
- At first, install composer and web server
- Create database 'socfi' in mysql (can use MySQL Workbench to do this)
- Duplicate socfi/.env.example and rename it to .env
- Open socfi/.env and edit DB_USERNAME & DB_PASSWORD to user in mysql (if user doesn't have password, then leave it empty)
- Direct to repo folder, open command line and run these lines
> composer dump-autoload
> php artisan key:generate
> php artisan migrate
> php artisan migrate --seed
