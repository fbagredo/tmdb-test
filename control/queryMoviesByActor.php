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

//query the list of movies
$movie = $movieDB->getMoviesByPerson($data->idPerson,'&sort_by=release_date.desc');
$movies = $movie['results'];

if ($movie['total_pages'] > 1){
	for ($i=2;$i<=$movie['total_pages']; $i++){
		$movieTemp = $movieDB->getMoviesByPerson($data->idPerson,'&sort_by=release_date.desc','&page='.$i);
		$moviesTemp = $movieTemp['results'];
		$movies = array_merge($movies,$moviesTemp);
	}
}

$numberMovies = count($movies);
$moviesArray = array();

foreach (array_keys($movies) as $key){
	if ($movies[$key]['poster_path'] != null)
		$posterPhoto = "<img src='https://image.tmdb.org/t/p/w185".$movies[$key]['poster_path']."'>";
	else
		$posterPhoto = "No picture found";
	$movieArray =
	array ($posterPhoto,
			$movies[$key]['release_date'],
			$movies[$key]['title'],
			$movies[$key]['overview']
	);
	array_push($moviesArray, $movieArray);
}

$finalArray['data'] = $moviesArray;
$peopleJSON =json_encode($finalArray);
$fp = fopen(dirname( __DIR__ ).'/ajax/resultsMovies.txt', "w");
fwrite($fp, $peopleJSON);
fclose($fp);

if ($numberMovies == 0)
	echo 'No actor or actresess found \n';
	else
		echo '<table id="datatable" class="display" cellspacing="0" width="100%">
            	<thead>
            		<tr>
                	<th>Poster</th>
                	<th>Release date</th>
                	<th>Movie title</th>
					<th>Overview</th>
            		</tr>
        		</thead>
        		<tfoot>
            		<tr>
                	<th>Poster</th>
                	<th>Release date</th>
                	<th>Movie title</th>
					<th>Overview</th>
            		</tr>
        		</tfoot>
			</table>';
?>