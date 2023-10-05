# co2tree (Compensate Order To Tree)

This project can help companies to reduce their carbon footprint by allowing them to offset their carbon emissions 
by donating to projects that reduce carbon emissions.

## Project setup

1. `composer install`
2. `cp .env.example .env` and fill in database credentials
3. `php artisan key:generate`
4. run `php artisan migrate:fresh --seed`
5. `npm install`
6. `npm run dev`

## Configuration

In order for the application to work you will need to create a Mollie key. You can do this by creating an account on
[Mollie](https://www.mollie.com/en/). After creating an account you can create a new API key. You will need to add this
key to the `.env` file as `MOLLIE_KEY`.

### Tests

1. `cp .env.testing.example .env.testing` and fill in database
2. run `php artisan test`


### Filament

This application uses [Filament](https://filamentphp.com/) as its backend administration interface. You can find the login page at `/admin`

### URL

https://778e-45-94-180-186.ngrok-free.app/transactions/9a4bc3e7-6bbf-408a-be6a-3a21d19f8004/start/6b6c735a575cc515f5b1619cc7949ed2?mass=10&distance=100&orderId=2023-AA22423
