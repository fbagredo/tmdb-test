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


$movieDB = new TheMovieDB();

$people = $movieDB->getPersonByName(str_replace(' ',"+",$data->name)); //blank spaces are replaced by '+'
$results = $people['results'];

$numberPeople = count ($results);

$peopleArray = array();

foreach (array_keys($results) as $key){
 
			if ($results[$key]['profile_path'] != null)
				$profilePhoto = "<img src='https://image.tmdb.org/t/p/w185".$results[$key]['profile_path']."'>";
			else 
				$profilePhoto = "No picture found";
			$personArray =
			array ($profilePhoto,
				$results[$key]['name'],
				'<a ng-href="queryMoviesByActor.php">List of movies</a>'
		);
		array_push($peopleArray, $personArray);
}
$finalArray['data'] = $peopleArray;
$peopleJSON =json_encode($finalArray);
$fp = fopen(dirname( __DIR__ ).'/ajax/results.txt', "w");
fwrite($fp, $peopleJSON);
fclose($fp);

if ($numberPeople == 0)
	echo 'No actor or actresess found \n';
?>