<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
$rest = db('SELECT rest_id FROM foods WHERE id='.$id.';')->fetch_assoc();
db('DELETE FROM foods WHERE id='.$id.';');
header('location: ../rest.php?id='.$rest['rest_id']);

?>