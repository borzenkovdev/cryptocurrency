"use strict";

jQuery.fn.highlight = function(increase) {
    var cssClass = (increase === true) ? 'percent-increase' : 'percent-decrease';
    var el = $(this);
    el.addClass(cssClass);
    setTimeout(function(){
        el.removeClass(cssClass);
    },2000);
}

var  app = angular.module("myApp", ["ngTable", "ngResource", "ngCookies" ]);

app.factory("QueryService", ["$resource", function($resource) {
    return $resource("/api/", {}, {
        catalog: {
            url: '/api/catalog',
            method: "GET",
            isArray: false
        },
        history: {
            url: '/api/history',
            method: 'GET',
            isArray: false
        }
    });
}]);

app.controller("CoreController",['$scope', '$cookies', function($scope, $cookies) {
    var api_id = $cookies.get('api_id');
    if (! api_id) {
        api_id = 1;
        $cookies.put('api_id', '1');
    }
    $scope.api_id = $cookies.get('api_id');
    $scope.$watch('api_id', function(newValue, oldValue) {
        $cookies.put('api_id', newValue);
    });
}]);

app.controller("ListController",['$interval', '$scope', '$cookies', 'NgTableParams', 'QueryService', function($interval, $scope, $cookies, NgTableParams, QueryService) {
    var api_id = $cookies.get('api_id');
    var newList = [];
    var oldList = [];

    $scope.tableParams = new NgTableParams({
        order: { percent: "ASC" },
        count: 10
    }, {
        getData: function(params) {
            return QueryService.catalog({
                filter: params.filter(),
                limit: params.count(),
                page: params.page(),
                order :  params.orderBy()
            }).$promise.then(function (req) {
                    params.total(req.count);
                    return req.rows;
                }).catch(function (e) {
                    alert('Нет связи с сервером');
                    console.log('Error request');
                    $interval.cancel(interval);
                })
        }
    });

    $scope.$watch('api_id', function(newValue, oldValue) {
        $scope.tableParams.reload();
        if (newValue !== oldValue) {
            window.location.reload(false);
        }
    });

    var interval = $interval(function() {
        $scope.tableParams.reload();
        setTimeout(function(){
            compareLists(oldList, newList);
        },1000);
    }, 5000);
}]);

app.controller("DetailController",['$interval', '$scope', '$cookies', 'NgTableParams', 'QueryService', function($interval, $scope, $cookies, NgTableParams, QueryService) {
    var api_id = $cookies.get('api_id');

    $scope.tableParams = new NgTableParams({
        order: { updated_at: "desc" },
        count: 10
    }, {
        getData: function(params) {
            return QueryService.history({
                filter: params.filter(),
                limit: params.count(),
                page: params.page(),
                order :  params.orderBy()
            }).$promise.then(function (req) {
                    params.total(req.count);
                    return req.rows;
                }).catch(function (e) {
                    alert('Нет связи с сервером');
                    console.log('Error request');
                    $interval.cancel(interval);
                })
        }
    });

    var interval = $scope.$watch('api_id', function(newValue, oldValue) {
        $scope.tableParams.reload();
        if (newValue !== oldValue) {
            window.location.reload(false);
        }
    });
}]);

/**
 * Сраниванивает элементы массива и подсвечивает если изменился процент
 * @param oldList
 * @param newList
 * @returns {boolean}
 */
function compareLists (oldList, newList) {
    if (oldList.lenth == 0) {
        return false;
    }
    $.each(oldList, function( index,oldItem ) {
        var newItem = $.grep(newList, function( item ) {
            return item.id == oldItem.id;
        });
        if (newItem[0].percent > oldItem.percent) {
            //подсвечиваем зелёным
            $("#currency_id_" + newItem[0].id).highlight(true);
        } else if (newItem[0].percent < oldItem.percent) {
            //подсвечиваем красным
            $("#currency_id_" + newItem[0].id).highlight(false);
        }
    });
}

