var app = angular.module('myApp', []);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

app.controller('penggunaController', function($scope, $http, $location) {

    $scope.header = "Hello, World!";

    var onUserComplete = function(response) {
        $scope.users = response.data;
    };

    var onError = function(reason){
        $scope.error = "could not fetch data";
    };

    var url = 'http://' + $location.host() + '/members/admin/profile/users';

    $http.get(url)
        .then(onUserComplete, onError);
});
