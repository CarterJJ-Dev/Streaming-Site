<?php
include('template/header.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $mysqli->query("SELECT * FROM movies WHERE id=" . $id) or die($mysqli->error);
}
?>

<div class="container">
  <div class="row">
    <?php
      while($row = $result->fetch_assoc()) {
        $name = $row["name"]; $plot = $row["plot"]; $cast = $row["cast"]; $year = $row["year"]; $runtime = $row["runtime"]; $rated = $row["rated"]; $rating = $row["rating"];
        $imdb = $row["imdb"]; $img = $row["img"]; $file_name = $row["file_name"];
    ?>
        <div class="col-xl-4 col-md-12">
          <img class="card-img-top mx-auto d-block" src="<?php echo $img; ?>" style="width: 16rem">
          <div class=" mx-auto d-block text-center" style="width: 16rem;">
            <a href="play.php?video=<?php echo $file_name; ?>" class="btn btn-primary mt-2">Play</a>
            <a href="https://www.redirect.am/?https://www.imdb.com/title/<?php echo $imdb; ?>" class="btn btn-primary mt-2">IMDb</a>
          </div>
        </div>

        <div class="col-xl-8 col-md-12">
          <?php
          echo "<h2 class=\"text-center\">" . $name . " (" . $year . ")</h2><br>";
          echo "<p> <b>Plot</b> <br>" . $plot . "</p>";
          echo "<p> <b>Cast</b> <br>" . $cast . "</p>";
          echo "<b>Runtime  </b>" . $runtime . "<b>  Rated  </b>" . $rated . "<b>  Rating  </b>" . $rating;
          ?>
        </div>

<?php } ?>
  </div>
</div>

<?php include('template/footer.php'); ?>
