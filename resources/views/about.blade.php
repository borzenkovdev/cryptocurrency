@extends('layout/main')

@section('pageTitle', 'О проекте')

@section('content')
    <div class="page-back">
        <a href="/">&larr; Вернуться к списку валют</a>
    </div>
    <div class="page-container">

        <p>Приложение, в реальном времени показывает/обновляет стоимость/%роста крипто-валют из разных источников.</p>

        <p>
            <b>Frontend</b>
            <ul>
                <li>Таблица с колонками: Name, Avg. Price, % Change(24h)</li>
                <li>Должен быть один фильтр по имени, если я ввожу имя, без перезагрузки надо отфильтровать список и показать только эту валюту и ее данные</li>
                <li>Так же, если курс или % растет, надо подсветить зеленым, если падает, то красным</li>
                <li>Сортировка по умолчанию должна быть по самому большому "% Change(24h)"</li>
            </ul>
        </p>
        <p>
            <b>Backend</b>
            <ul>
                <li>В базе должен быть список валют, последние данные, исторические данные</li>
                <li>Список валют, которые надо парсить: Bitcoin, Ethereum, Ripple, Litecoin, NEO</li>
            </ul>
        </p>
        <p>
            <b>Kурсы и проценты</b>
            <ul>
                <li>https://coinmarketcap.com/</li>
                <li>http://coincap.io/</li>
            </ul>
        </p>
        <p>
            <b>Стек технологий</b>
            Laravel 5.5, jQuery, MySQL, Angular 1.6.6, Php7+
        </p>
    </div>
@endsection('content')