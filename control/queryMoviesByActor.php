<?php
$idPerson = $results[0]['id'];
$movie = $movieDB->getMoviesByPerson($idPerson,'&sort_by=release_date.desc');
$movies = $movie['results'];

if ($movie['total_pages'] > 1){
	for ($i=2;$i<=$movie['total_pages']; $i++){
		$movieTemp = $movieDB->getMoviesByPerson($idPerson,'&sort_by=release_date.desc','&page='.$i);
		$moviesTemp = $movieTemp['results'];
		$movies = array_merge($movies,$moviesTemp);
	}
}

foreach (array_keys($movies) as $key)
	echo $movies[$key]['id']. '      '. $movies[$key]['title']. '      '.
	$movies[$key]['release_date']. '</br>';
?>