<?php
session_start();
include('../db/connect.php');

$payment = $_GET['payment'];
db('UPDATE orders SET d_id='.$_SESSION['id'].' WHERE payment_number='.$payment.';');
$_SESSION['BLOCK'] = true;
header('location: ../transport.php');
?>