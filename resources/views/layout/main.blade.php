<!DOCTYPE html>
<html ng-app="myApp" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('pageTitle')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    </head>

    <body ng-controller="CoreController">
        <div class="container">

            @include('layout.header')


            @yield('content')


            @include('layout.footer')
        </div>
    </body>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular-sanitize.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular-resource.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular-route.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular-cookies.js"></script>
    <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="/js/app.js"></script>
</html>
