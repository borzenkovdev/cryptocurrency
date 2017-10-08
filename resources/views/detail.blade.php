@extends('layout/main')

@section('pageTitle', $type->name)

@section('content')
    <div class="page-back">
        <a href="/">&larr; Вернуться к списку валют</a>
    </div>
    <div class="page-container" ng-controller="DetailController">
        <table ng-table="tableParams" class="table table-condensed table-bordered table-striped">
            <tr ng-repeat="currency in $data">
                <td data-title="'#'">@{{$index+1}}</td>
                <td data-title="'Цена в usd'">@{{currency.price}}</td>
                <td data-title="'Процент изменения'">@{{currency.percent}}</td>
                <td data-title="'Дата обновления'">@{{currency.updated_at}}</td>
            </tr>
        </table>
    </div>

@endsection('content')