var app = angular.module("main", ["ngRoute"], function($interpolateProvider){
    $interpolateProvider.startSymbol('{*');
    $interpolateProvider.endSymbol('*}');
});
