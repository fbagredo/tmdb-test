 <?php
 if(array_key_exists('personId', $_GET)) {
     $personId = (int) $_GET['personId'];
 }
 ?>

<!DOCTYPE html>
<html ng-app="queryMoviesbyActor">
	<script src="../js/jquery-2.2.0.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/angular.min.js"></script>
	<script src="../js/queryMoviesbyActor.js"></script>
	
	<link rel="stylesheet" href="../styles/jquery.dataTables.min.css">
	
	<head>
		<title>Query by Actor/Actress</title>
	</head>

	<body>
	    <div ng-controller="queryMoviesbyActor">
	    	<form  id="frmQueryMoviesByActor" name="frmQueryMoviesByActor"  class="well form-search"   >
                <div style="display:none">
                <input type="text" id="personId" placeholder="personId" value="<?php echo $personId; ?>" >
            	</div>
            </form>
            <div id="table"></div>
 		</div>
    </body>

</html>
