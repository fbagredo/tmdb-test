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

$people = $movieDB->getPersonByName($data->name);

//now i am just printing the values
echo "people : ";
echo $people;

?>