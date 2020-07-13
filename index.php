<?php

// Display header
include('template/header.php');

// Pull movie results from database and limit to 20
$result = $mysqli->query("SELECT id, name, img, file_name FROM movies LIMIT 20") or die($mysqli->error);

// Display movie results
include('template/list.template.php');

// Display footer
include('template/footer.php');
?>
