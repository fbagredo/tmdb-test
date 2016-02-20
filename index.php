<!DOCTYPE html>
<html ng-app="queryMovies">
	<script src="js/angular.min.js"></script>
	<script src="js/queryMovies.js"></script>
	
	<head>
		<title>Query by Actor/Actress</title>
	</head>

	<body>
	    <div ng-controller="QueryMoviesCtrl">
            <form  name="frmQueryMovies"  class="well form-search"   >
                <input type="text" ng-model="name" class="input-medium search-query" placeholder="Name" required >
                <button type="submit" class="btn" ng-click="formsubmit(frmQueryMovies.$valid)"  ng-disabled="frmQueryMovies.$invalid">Submit </button>
            </form>
            <pre ng-model="result">
                {{result}}
            </pre>
        </div>
    </body>

</html>
