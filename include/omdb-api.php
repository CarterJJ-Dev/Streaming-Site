<?php

require('db.php');

// Scan directory for mp4 files
$files = glob('../videos/movies/*.mp4');

foreach($files as $file) {
  // Get file name without directory path
	$noPath = basename($file);
  
  // Remove file extension
  $noExt = basename($file, ".mp4");

  // Extract year from file name then remove year from file name
	$year = substr($noExt, -4);
  $title = substr_replace($noExt,"", -5);

  // Remove period from file name and replace with plus sign for omdb search
	$title = str_replace('.', '+', $title);

  // OMDB API call
	$obj = json_decode(file_get_contents('http://www.omdbapi.com/?t=' . $title . '&y=' . $year . '&apikey=7e54a727'), true);
	if($obj['Response'] == 'False') {
      // If search unsuccessful move file to error directory
	    shell_exec("mv " . escapeshellarg($file) . " " . escapeshellarg('../videos/error/'));
	    break;
	} else {
	    $title = $obj['Title'];
	    $year = $obj['Year'];
	    $rated = $obj['Rated'];
	    $released = $obj['Released'];
	    $runtime = $obj['Runtime'];
	    $genre = $obj['Genre'];
	    $actors = $obj['Actors'];
	    $plot = $obj['Plot'];
	    $rating = $obj['imdbRating'];
	    $imdbid = $obj['imdbID'];
      $poster = $obj['Poster'];
	}

  // Download poster with name of file name and imdb id
	$dir = "../posters/movies";
	copy($poster, $dir . DIRECTORY_SEPARATOR . $noExt . '.' . $imdbid . '.jpg');
  $poster = $noExt . '.' . $imdbid . '.jpg';
}
?>
