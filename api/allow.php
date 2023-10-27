<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
$allow = $_GET['allow'];
$role = $_GET['role'];

// UPDATE
db('UPDATE '.$role.' SET allow='.$allow.' WHERE id='.$id.';');
header('location: ../admin.php');

?>