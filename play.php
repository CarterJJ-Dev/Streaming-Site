<?php

require('include/db.php');

if (!empty($_GET['video'])) {
  $video = $_GET['video'];
}
$video = $mysqli->real_escape_string($video);
$result = $mysqli->query("SELECT name, file_name FROM movies WHERE file_name = '$video'") or die ($mysqli->error);
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Streaming-Site Now Playing <?php echo $video; ?></title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="robots" content="NOINDEX, NOFOLLOW">
</head>
  <body style="background-color:black;">
    <?php foreach ($rows as $row) {
      $link = 'videos/movies/' . $row["file_name"]; ?>
      <video style="display:block; margin: 0 auto; margin-top: 10%;" controls width="780" height="500" controls autoplay>
      <source src="<?php echo $_SERVER["SERVER_NAME"] . '/' . $link; ?>" type="video/mp4">
      </video>
    <?php } ?>
  </body>
</html>
