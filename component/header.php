<link rel="stylesheet" href="bst/css/bootstrap.min.css">
<script src="bst/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php
include('db/connect.php');

if (isset($_SESSION["ISLOGIN"])) {
    
// customer
if ($_SESSION["role"] == 'customer') { ?>
    

<!-- <div>
    <a href="index.php">HOME</a>
    <a href="profile.php"><img width="200"  alt=""></a>
    <a href="cart.php">CART</a>
    <a href="logout.php">logout</a>
</div> -->
<!-- NEW -->
<header>
    <div class="logo">
        <a href="index.php">
            <img src="image/logo/logo90x50px-1.jpg">
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center gap-3 right-menu rounded-pill text-light" href="profile.php">
            <img class="rounded-pill" src="image/icon/<?php echo $_SESSION['profile'] ?>.png">
        </a>
        <div style="border: 1px solid white; height: 30px;"></div>
        <a class="right-menu text-light rounded-pill" href="cart.php">
            <img src="image/icon/basket.png" width="30px">
        </a>
        <a class="logout text-light rounded-pill" href="logout.php">
            Logout
        </a>
    </div>
</header>

<?php }else if ($_SESSION['role'] == "manager") { ?>


<!-- <div>
    <a href="index.php">HOME</a>
    <a href="profile.php"><img width="200" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg" alt=""></a>
    <a >RESTAURANT</a>
    <a href="logout.php">logout</a>
</div> -->
<!-- NEW -->
<header>
    <div class="logo">
        <a href="index.php">
            <img src="image/logo/logo90x50px-1.jpg">
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center gap-3 right-menu rounded-pill text-light" href="profile.php">
            <img class="rounded-pill" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg">
        </a>
        <div style="border: 1px solid white; height: 30px;"></div>
        <a class="right-menu text-light rounded-pill" href="rest.php?id=<?php echo db('SELECT id FROM restaurant WHERE m_id='.$_SESSION['id'].';')->fetch_assoc()['id']; ?>">
            <img src="image/icon/restaurant.png" width="30px">
        </a>
        <a class="logout text-light rounded-pill" href="logout.php">
            Logout
        </a>
    </div>
</header>

<?php }else if ($_SESSION['role'] == "admin") { ?>


<!-- <div>
    <a href="index.php">HOME</a>
    <a href="profile.php"><img width="200" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg" alt=""></a>
    <a href="admin.php">DASHBOARD</a>
    <a href="logout.php">logout</a>
</div> -->
<!-- NEW -->
<header>
    <div class="logo">
        <a href="index.php">
            <img src="image/logo/logo90x50px-1.jpg">
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center gap-3 right-menu rounded-pill text-light" href="profile.php">
            <img class="rounded-pill" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg">
        </a>
        <div style="border: 1px solid white; height: 30px;"></div>
        <a class="right-menu text-light rounded-pill" href="admin.php">
            <img src="image/icon/admin.png" width="30px">
        </a>
        <a class="logout text-light rounded-pill" href="logout.php">
            Logout
        </a>
    </div>
</header>


<?php }else if ($_SESSION['role'] == "delivery") { ?>

<!-- 
<div>
    <a href="index.php">HOME</a>
    <a href="profile.php"><img width="200" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg" alt=""></a>
    <a href="delivery.php">DELIVERY</a>
    <a href="logout.php">logout</a>
</div> -->
<!-- NEW -->
<header>
    <div class="logo">
        <a href="index.php">
            <img src="image/logo/logo90x50px-1.jpg">
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center gap-3 right-menu rounded-pill text-light" href="profile.php">
            <img class="rounded-pill" src="assets/profile/<?php echo $_SESSION['profile'] ?>.jpg">
        </a>
        <div style="border: 1px solid white; height: 30px;"></div>
        <a class="right-menu text-light rounded-pill" href="delivery.php">
            <img src="image/icon/food-delivery.png" width="30px">
        </a>
        <a class="logout text-light rounded-pill" href="logout.php">
            Logout
        </a>
    </div>
</header>


<?php } 
}else{ ?>


<header>
    <div class="logo">
        <a href="index.php">
            <img src="image/logo/logo90x50px-1.jpg">
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a class="right-menu text-light rounded-pill" href="register.php">Register</a>
        <div style="border: 1px solid white; height: 30px;"></div>
        <a class="right-menu text-light rounded-pill" href="login.php">Login</a>
    </div>
</header>


<?php }
?>