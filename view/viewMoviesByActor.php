<!DOCTYPE html>
<html ng-app="queryMovies">
	<script src="js/jquery-2.2.0.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/queryMovies.js"></script>
	
	<link rel="stylesheet" href="styles/jquery.dataTables.min.css">
	
	<head>
		<title>Query by Actor/Actress</title>
	</head>

	<body>
	    <div ng-controller="QueryMoviesbyActor">
            <form  name="frmQueryMovies"  class="well form-search"   >
                <input type="text" ng-model="name" class="input-medium search-query" placeholder="Name" required >
                <button type="submit" class="btn" ng-click="formsubmit(frmQueryMovies.$valid)"  ng-disabled="frmQueryMovies.$invalid">Submit </button>
            </form>
            <div id="table"></div>
 		</div>
    </body>

</html>
