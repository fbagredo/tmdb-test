/**
 * @filesource : queryMovies.js
 * @author : Fernando Becerra  <fernando.becerra.a@gmail.com.com>
 * @abstract : controller for a HTML page
 * 
 *  */

var app = angular.module('queryMovies', []);

app.controller("QueryMoviesCtrl", ['$scope', '$http', function($scope, $http) {
        $scope.url = 'control/queryMovies.php';

        $scope.formsubmit = function(isValid) {

            if (isValid) {
              
                $http.post($scope.url, {"name": $scope.name}).
                        success(function(data, status) {
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data; 
                        })
            }else{
                
                  alert('Form is not valid');
            }

        }

    }]);