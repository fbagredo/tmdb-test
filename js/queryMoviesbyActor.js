/**
 * @filesource : queryMoviesbyActor.js
 * @author : Fernando Becerra  <fernando.becerra.a@gmail.com.com>
 * @abstract : controller for a HTML page
 * 
 *  */

var app = angular.module('queryMoviesbyActor', []);

app.controller("queryMoviesbyActor", ['$scope', '$http', function($scope, $http) {
        $scope.url = '../control/queryMoviesByActor.php';
        
        $scope.personId = document.getElementById("personId").value;
              
        $http.post($scope.url, {"idPerson": $scope.personId}).
                        success(function(data, status) {
                            $scope.status = status;
                            $('#table').html(data);
                            
                            if ( $.fn.dataTable.isDataTable( '#datatable' ) ) 
                            	table.destroy();
                            
                            table = $('#datatable').DataTable( {
                                "ajax": '../ajax/resultsMovies.txt',
                                "order": [[ 1, "desc" ]]
                            } );
                            

                        })
    	}]);
