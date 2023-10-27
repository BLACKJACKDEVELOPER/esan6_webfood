<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="css/reglog.css">
    <link rel="icon" href="image/logo/Logo.ico">
</head>

<body>
    <?php include('component/header.php'); ?>
    <!-- SERVER -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        if (!$username || !$fullname || !$address || !$password) {
            echo 'ว่าง';
        } else {
            $id = rand();
            // INSERT IN TO DATABASE
            if ($role == "customer") {
                db('INSERT INTO customer(id,username,fullname,address,password) VALUES 
            (' . $id . ',"' . $username . '","' . $fullname . '","' . $address . '","' . $password . '");');
                header('location: login.php');
            } else if ($role == "manager") {
                db('INSERT INTO manager(id,username,fullname,address,password) VALUES 
            (' . $id . ',"' . $username . '","' . $fullname . '","' . $address . '","' . $password . '");');
                db('INSERT INTO restaurant(m_id) VALUES 
            (' . $id . ');');
                header('location: login.php');
            } else if ($role == "delivery") {
                db('INSERT INTO delivery(id,username,fullname,address,password) VALUES 
            (' . $id . ',"' . $username . '","' . $fullname . '","' . $address . '","' . $password . '");');
                header('location: login.php');
            }
        }
    }
    ?>


    <form method="post">
        <h2 class="mb-4">Register</h2>
        <p>Username</p>
        <input type="text" name="username">
        <p>Fullname</p>
        <input type="text" name="fullname">
        <p>Address</p>
        <input type="text" name="address">
        <p>Password</p>
        <div class="pass">
            <input id="password" type="password" name="password">
            <img id="eye" onclick="showHide()" src="image/icon/show.png" width="23px">
        </div>
        <select name="role" id="">
            <option value="customer" Selected>Customer</option>
            <option value="manager">Restaurant manager</option>
            <option value="delivery">Delivery</option>
        </select><br>
        <button class="rounded-pill my-3" type="submit">Register</button>
        <p class="text-secondary">Already have an account? <a style="color: #fa654d;" href="login.php">Login</a></p>
    </form>
    <script src="js/eye.js"></script>



</body>

</html>