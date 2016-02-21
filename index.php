<!DOCTYPE html>
<html ng-app="queryMovies">
	<script src="js/jquery-2.2.0.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/queryMovies.js"></script>
	
	<link rel="stylesheet" href="styles/jquery.dataTables.min.css">
	<link href="styles/bootstrap.css" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
 
	
	<head>
		<title>Query by Actor/Actress</title>
	</head>

	<body>
	<div class="container">
		<div class="row">
		<div class="col-md-6 col-sm-12 col-md-offset-3 subscribe">
	    <div ng-controller="QueryMoviesCtrl">
            <form  class="form-horizontal" role="form" name="frmQueryMovies">
            	<div class="form-group">
					<div class="col-md-7 col-sm-6 col-sm-offset-1 col-md-offset-0">
                		<input type="text" ng-model="name" class="form-control input-lg" placeholder="Type the name of an actor or actress" required="required" >
                	</div>
                	<div class="col-md-5 col-sm-4">
                		<button type="submit" class="btn btn-success btn-lg" ng-click="formsubmit(frmQueryMovies.$valid)"  ng-disabled="frmQueryMovies.$invalid">Search</button>
            		</div>
            	</div>
            </form>
            <div id="table"></div>
 		</div>
 		</div>
 		</div>
 	</div>	
    </body>

</html>
