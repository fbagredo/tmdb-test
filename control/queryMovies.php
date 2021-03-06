<?php
/**
 * @filesource : queryMovies.php
 * @author : Fernando Becerra  <fernando.becerra.a@gmail.com>
 * @abstract : Control for quering the movie data base
 * 
 *  */
require_once realpath( dirname( __FILE__ )).'/../model/TheMovieDB.php';

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

//new instance of the model The movie DB data base
$movieDB = new TheMovieDB();

$people = $movieDB->getPersonByName(str_replace(' ',"+",$data->name)); //blank spaces are replaced by '+'
$results = $people['results'];

$numberPeople = count ($results);

$peopleArray = array();

foreach (array_keys($results) as $key){ //filter the data needed
 
			if ($results[$key]['profile_path'] != null)
				$profilePhoto = "<img src='https://image.tmdb.org/t/p/w185".$results[$key]['profile_path']."'>";
			else 
				$profilePhoto = "No picture found";
			$personArray =
			array ($profilePhoto, 
				$results[$key]['name'], //name of the artist
				'<a href="../view/viewMoviesByActor.php?personId='.$results[$key]['id'].'" target="_blank">List of movies</a>'
		);
		array_push($peopleArray, $personArray);
}
$finalArray['data'] = $peopleArray; //create a json file for the Jquery datatable
$peopleJSON =json_encode($finalArray);
$fp = fopen(dirname( __DIR__ ).'/ajax/results.txt', "w");
fwrite($fp, $peopleJSON);
fclose($fp);

if ($numberPeople == 0) 
	echo 'No actor or actress found';
else //output to create de table an populate via AJAX
	echo '<table id="datatable" class="display" cellspacing="0" width="100%">
            	<thead>
            		<tr>
                	<th></th>
                	<th>Actor</th>
                	<th>View list of movies</th>
            		</tr>
        		</thead>
        		<tfoot>
            		<tr>
                	<th></th>
                	<th>Actor</th>
                	<th>View list of movies</th>
            		</tr>
        		</tfoot>
			</table>';
?>