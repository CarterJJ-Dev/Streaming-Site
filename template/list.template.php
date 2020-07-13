<div class="container">
  <div class="row">
    <?php
      while($row = $result->fetch_assoc()) {
        $id = $row["id"]; $name = $row["name"]; $img = $row["img"]; $file_name = $row["file_name"];
    ?>
    <div class="card" style="width: 12rem;">
      <img class="card-img-top" src="<?php echo $img; ?>" alt="Card image cap">
      <div class="card-body text-center">
        <h5 class="card-title"><?php echo $name; ?></h5>
        <a href="play.php?video=<?php echo $file_name; ?>" class="btn btn-primary">Watch</a>
        <a href="details.php?id=<?php echo $id; ?>" class="btn btn-primary">Info</a>
      </div>
  </div>
<?php } ?>
  </div>
</div>
