<h2>An application that shows/updates the value/% growth of cryptocurrencies from different sources in real time.</h2>

## Installation

**NPM**

```
npm install
```
**Composer**

```
composer install
```

**database**

```
Create a database.
Change permissions in the .env file
Run migrations - php artisan migrate
```
**Run console commands**

```
php artisan currencies:update
php artisan currencies:history

For the data to appear
```

## Console commands

```
Start updating data on crypto currencies - php artisan currencies:update
``
Start saving data on rate changes - php artisan currencies:history
``
Run deletion of obsolete data - php artisan currencies:delete_old
```

##Compatibility
PHP 7+
