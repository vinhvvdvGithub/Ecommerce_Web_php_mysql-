<?php
require "config.php";
require "./models/protype.php";
$protype = new Protype;
$protype->deleteByProtype($_GET['id']);
header("location: protypes.php");
?>