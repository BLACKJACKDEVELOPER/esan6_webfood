<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
db('DELETE FROM discount WHERE code='.$id.';');
header('location: ../postdiscount.php');
?>