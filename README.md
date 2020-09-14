# Demo Laravel

## Deploy
- composer install
- npm install
- php artisan key:generate
- php artisan migrate:fresh or php artisan migrate
- php artisan db:seed
- php artisan passport:install

## User
### Fields
- name
- email
- username
- password
- phone
- birthday

### Routes
- **api/register (post)** email, username are unique. The name, email, username and password are required. The password has to be confirmed (password_confirmation). The other two options are optional phone and birthday. The response is a token that will be used to authenticate.
- **api/login (post)** email, password required. The response will return a token to authenticate.
- **api/user (get)** return all users in database. You have to pass the auth token.
- **api/user/id (get)** return the user that matches the id.
- **api/user/id (put)** updates name, phone, and birthday of the user that matches the id.
- **api/user/id (delete)** deletes the user that matches the id.
- **forget-password (get)** sends an email with a token. email required.
- **reset-password (post)** change the password. Requires the token.

## Product
### Fields
- sku
- name
- quantity
- price
- description

### Routes
- **api/products (post)** name, quantity, price are required. Optional fields sku, description.
- **api/products (get)** returns all the products in the database.
- **api/products/id (get)** returns the product that matches the id.
- **api/products/id (put)** updates sku, name, quatity, price, description of the product that matches the id.
- **api/products/id (delete)** deletes the product that matches the id.

## Postman

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/9aee37be13f71b2b31cc)

## Dump file
The file is in the root of the repository.
*dump.sql*

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
