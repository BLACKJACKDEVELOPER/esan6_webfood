<?php
session_start();
include('../db/connect.php');

$id = $_GET['id'];
$food = db('SELECT * FROM foods WHERE id='.$id.';');
if ($food->num_rows > 0) {
    $food =$food->fetch_assoc();
    $has = db('SELECT * FROM viewcart WHERE c_id='.$_SESSION['id'].' AND f_id='.$_GET['id'].';');
    if ($has->num_rows > 0) {
        $has = $has->fetch_assoc();
        db('UPDATE viewcart SET amount='.($has['amount'] + 1).' WHERE c_id='.$_SESSION['id'].' AND f_id='.$_GET['id'].';');
    }else{
        db('INSERT INTO viewcart(foodname,price,amount,rest_id,f_id,c_id) VALUES 
        ("'.$food['foodname'].'","'.$food['price'].'",1,'.$food['rest_id'].','.$food['id'].','.$_SESSION['id'].');');
    }
}



header('location: ../rest.php?id='.$food['rest_id']);

?>