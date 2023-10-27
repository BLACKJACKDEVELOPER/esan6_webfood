<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
db('DELETE FROM resttype WHERE type="'.$id.'";');
header('location: ../admin.php');

?>