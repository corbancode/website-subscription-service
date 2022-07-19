# Websites Subscription API
This is a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

### Requirements
* **PHP**: 8.0.2 or higher.
* **MySQL**: 5.7.23 or higher.
* **Composer**

### Installation and Configuration
#### Setup
- Create a .env file from the .env.example file with this command `cp .env.example .env`.
- Update your database credentials in your `.env`.
- Update your email credentials in the `.env` file'.
- Run `composer install` to install dependencies.
- Run `php artisan migrate` to database migrations.
- If you would like to have some dummy data, run `php artisan db:seed`.
#### Running Development Server
- Run `php artisan serve` to start the development server
- Because some operations are queued, you need to run `php artisan queue:work` to process the jobs.
- You can now access the server on your localhost e.g `http://localhost:{APP_PORT}`

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Ayomide Olakulehin via [oayomideelijah@gmail.com](oayomideelijah@gmail.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
