<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
db('DELETE FROM typefood WHERE id='.$id.';');
header('location: ../posttypefood.php');

?>