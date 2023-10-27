<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="image/logo/Logo.ico">
</head>

<body>
    <?php include('component/header.php'); ?>
    <!-- banner -->
    <div class="banner">
        <img id="banner" src="image/banner/Food-Facebook-Cover-Banner-19.jpg">
    </div>

    <!-- searchbar -->
    <div class="search">
        <form class="d-flex align-items-center gap-3">
            <div class="search-icon">
                <input class="ps-5" type="text" name="rest">
                <img src="image/icon/search.png">
            </div>
            <button class="rounded-pill px-3" type="submit">Search</button>
        </form>
    </div>


    <!-- main -->
    <div class="main-container">
        <div class="px-5">
            <h1>ร้านทั้งหมด</h1>
            <div class="content-container">
                <?php
                include('component/rest.php');
                if (isset($_GET['rest'])) {
                    $rest = db('SELECT manager.profile,restaurant.rest_name,restaurant.rest_type,restaurant.id FROM restaurant INNER JOIN manager ON restaurant.m_id=manager.id 
        AND restaurant.rest_name LIKE "%' . $_GET['rest'] . '%";');
                    if ($rest->num_rows > 0) {
                        rests($rest);
                    }
                } else {
                    $rest = db('SELECT manager.profile,restaurant.rest_name,restaurant.rest_type,restaurant.id FROM restaurant INNER JOIN manager ON restaurant.m_id=manager.id;');
                    if ($rest->num_rows > 0) {
                        rests($rest);
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="js/banner-res.js"></script>
</body>

</html>