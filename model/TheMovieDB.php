<?php
/**
 * @filesource : TheMovieDB.php
 * @author : Fernando Becerra  <fernando.becerra.a@gmail.com>
 * @abstract : Access to the Movie data base
 *
 *  */

class TheMovieDB {
	private static $strApiKey = '&api_key=42d4ceeb129debfc2e72153fc243a1d6';
	private static $strQueryPerson = 'http://api.themoviedb.org/3/search/person?query=';
	private static $strQueryMovies = 'http://api.themoviedb.org/3/discover/movie?with_people=';
	
	private $curlConn;
	
	/*Create a connection
	 * Params: $query: sting to query the movieDB
	 * 		   $values: values to quering
	 *         $sortby: optional
	 *         $page: optional, number of the page returned
	 */
	static function createConnection($query, $values, $sortBy=NULL,$page=NULL){
		$curlConn = curl_init();
		curl_setopt($curlConn, CURLOPT_URL, $query.$values.$page.$sortBy.TheMovieDB::$strApiKey);
		curl_setopt($curlConn, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curlConn, CURLOPT_HEADER, FALSE);
		curl_setopt($curlConn, CURLOPT_HTTPHEADER, array("Accept: application/json"));
		$response = curl_exec($curlConn);
		curl_close($curlConn);	
		
		return $response;
	}
	
	public function getPersonByName($name){
		$response = TheMovieDB::createConnection(TheMovieDB::$strQueryPerson, $name);
		$JSONResponse = json_decode($response, true);
		return $JSONResponse;
	}
	
	public function getMoviesByPerson($idPerson,$sortBy=NULL,$page=NULL){
		$response = TheMovieDB::createConnection(TheMovieDB::$strQueryMovies, $idPerson,$sortBy,$page);
		return json_decode($response, true);
	}
}