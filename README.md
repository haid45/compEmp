## Welcome to compEmp

compEmp is a simple laravel project to manage companies and their employees.

##Installation

- Clone the compEmp repo https://github.com/haid45/compEmp
- Run `composer install`.
- Make a copy of the `.env.example` file that is in the root directory and rename it to `.env`.
- Fill in `DB_DATABASE`, `DB_USERNAME` & `DB_PASSWORD` according to your local DB.
- Ensure that the `FILESYSTEM_DRIVER` is `public`.
- Enter the mailer details for the emails to work correctly. `Mailtrap` is suggested.
- Once the steps above are complete, proceed to run `php artisan migrate:refresh --seed`.
- Followed by `php artisan storage:link`.
- Use the following login details `admin@admin.com` & `password`.

## Testing
You can run the tests with:
`./vendor/bin/phpunit`

V1 currently only has migration and seed testing. More tests in the next release.

##Credits
- [Laravel](https://laravel.com/).
- [JQuery](https://jquery.com).
- [Open Iconic Icons](https://useiconic.com/open)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
