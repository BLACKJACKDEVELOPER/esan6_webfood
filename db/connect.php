<?php

function db($qr) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "esan6";

    //conn
    $conn = new mysqli($server,$username,$password,$database);

    // return query
    return $conn->query($qr);
}

?>