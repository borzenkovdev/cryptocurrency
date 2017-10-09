<h2>Приложение, в реальном времени показывает/обновляет стоимость/%роста крипто-валют из разных источников.</h2>

## Установка

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
Создать базу данных.
Поменять доступы в файле .env
Запустить миграции   - php artisan migrate  
```
**Запустить консольные команды**

```
php artisan currencies:update  
php artisan currencies:history 

Чтобы появились данные
```

## Консольные команды

```
Запустить обновление данных по крипто валютам   - php artisan currencies:update  
``
Запустить сохранение данных по изменению курса - php artisan currencies:history  
``
Запустить удаление устаревших данных   - php artisan currencies:delete_old  
```

## Compatibility
PHP 7+


