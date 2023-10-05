# DLF Hackathon 2023

## Project setup

1. `composer install`
2. `cp .env.example .env` and fill in database, cms credentials and cms api key
3. `php artisan key:generate`
4. run `php artisan migrate:fresh --seed` or import acc database.
5. `npm install`
6. `npm run dev`

### Tests

1. `cp .env.testing.example .env.testing` and fill in database
2. run `php artisan test`


### Filament

This application uses [Filament](https://filamentphp.com/) as its backend administration interface. You can find the login page at `/admin`
