<?php

// Display header
include('template/header.php');

// Pull all movie results from database
$result = $mysqli->query("SELECT id, name, img, file_name FROM movies") or die($mysqli->error);

// Display movie results
include('template/list.template.php');

// Display footer
include('template/footer.php');
?>
