<?php
include('template/header.php');
$result = $mysqli->query("SELECT id, name, img FROM movies") or die($mysqli->error);
?>


<div class="container">
  <div class="row">
    <?php
      while($row = $result->fetch_assoc()) {
        $id = $row["id"]; $name = $row["name"]; $img = $row["img"];
    ?>
    <div class="card" style="width: 12rem;">
      <img class="card-img-top" src="<?php echo $img; ?>" alt="Card image cap">
      <div class="card-body text-center">
        <h5 class="card-title"><?php echo $name; ?></h5>
        <a href="play.php" class="btn btn-primary">Watch</a>
        <a href="details.php?id=<?php echo $id; ?>" class="btn btn-primary">Info</a>
      </div>
  </div>
<?php } ?>
  </div>
</div>



<?php
include('template/footer.php');
?>
