## Instructions

1. Use command to install dependencies 
- composer install

2. Use command to generate laravel encryption key
- php artisan key:generate

3. Change the db settings in .env file (Either an sqlite file or a mysql/postgre can be used) - currently configred to sqlite for convinience but absolute path is needed here
- Relative Path - \storage\app\database.sqlite
- Please create an empty .sqlite file to initiate

4. Use command to create database tables
- php artisan migrate

5. Create a user with these 2 commands - 
- php artisan tinker
- User::factory()->create(['name' => 'test', 'email' => 'test@test.com', 'password' => bcrypt('12345678')]);

6. Use command to run test
- php artisan test

7. Use command to start the application or alternatively copy the folder to a web server
- php artisan serve

8. Login to the application using the created user as in step 5

## Modified/Added files to framework
- Design changes.docx
- .env
- app\Http\Controllers\Admin\DashboardController.php
- app\Http\Controllers\Auth\AuthController.php
- app\Http\Services\FoodRatingsService.php
- app\resources\views\admin\dashboard.blade.php
- app\resources\views\admin\establishments.blade.php
- app\resources\views\auth\login.blade.php
- app\resources\views\layouts\main.blade.php
- app\routes\web.php
- app\tests\Feature\AppTest.php
