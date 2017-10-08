<p>Приложение, в реальном времени показывает/обновляет стоимость/%роста крипто-валют из разных источников.</p>

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
Создать базу данных и запустить миграции   - php artisan migrate  
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


