@extends('layout/main')

@section('pageTitle', 'Список криптовалют')

@section('content')
    <div ng-controller="ListController as vm">
        <table ng-table="tableParams" show-filter="true" class="table table-condensed table-bordered table-striped currencies-list">
            <tr id="currency_id_@{{currency.id}}" ng-repeat="currency in $data">
                <td data-title="'#'">@{{$index+1}}</td>
                <td filter="{name: 'text'}" data-title="'Криптовалюта'">
                    <span class="sprite sprite-@{{currency.currency_type.symbol}} small_coin_logo"></span>
                     <a href="/detail/@{{currency.currency_type.symbol}}">@{{currency.currency_type.name}}</a>
                </td>
                <td data-title="'Цена в usd'">
                    @{{currency.price}}
                </td>
                <td sortable="'percent'" data-title="'Процент изменения'">
                    @{{currency.percent}}
                </td>
                <td data-title="'Дата обновления информации'">
                    @{{currency.updated_at}}
                </td>
                <td>
                    <a href="/detail/@{{currency.currency_type.symbol}}">Подробнее</a>
                </td>
            </tr>
        </table>
    </div>

@endsection('content')