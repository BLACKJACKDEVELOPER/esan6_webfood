<?php
session_start();
include('../db/connect.php');

$payment = $_GET['payment'];

// UPDATE
db('UPDATE orders SET status=true WHERE payment_number='.$payment.';');
unset($_SESSION['BLOCK']);
header('location: ../delivery.php');

?>