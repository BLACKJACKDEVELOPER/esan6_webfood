<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/reglog.css">
    <link rel="icon" href="image/logo/Logo.ico">
</head>
<body>
    <?php include('component/header.php'); ?>
<!-- SERVER -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$username || !$password) {
        echo 'ว่าง';
    }else{
        //find

        $customer = db('SELECT * FROM customer WHERE username="'.$username.'" AND password="'.$password.'";');
        $manager = db('SELECT * FROM manager WHERE username="'.$username.'" AND password="'.$password.'";');
        $delivery = db('SELECT * FROM delivery WHERE username="'.$username.'" AND password="'.$password.'";');
        $admin = db('SELECT * FROM admin WHERE username="'.$username.'" AND password="'.$password.'";');
        $data = "";
        if ($customer->num_rows > 0) {
            $data = $customer->fetch_assoc();
            $_SESSION["id"] = $data['id'];
            $_SESSION["profile"] = $data['profile'];
            $_SESSION['ISLOGIN'] = true;
            $_SESSION["role"] = 'customer';
            if ($data['allow'] == false) {
                header('location: logout.php');
            }else{
                header('location: index.php');
            } 
        }else if ($manager->num_rows > 0) {
            $data = $manager->fetch_assoc();
            $_SESSION["id"] = $data['id'];
            $_SESSION["profile"] = $data['profile'];
            $_SESSION['ISLOGIN'] = true;
            $_SESSION["role"] = 'manager';
            $_SESSION['REST'] = db('SELECT id FROM restaurant WHERE m_id='.$data['id'].';')->fetch_assoc()['id'];
            if ($data['allow'] == false) {
                header('location: logout.php');
            }else{
                header('location: index.php');
            }
        }else if ($delivery->num_rows > 0) {
            $data = $delivery->fetch_assoc();
            $_SESSION["id"] = $data['id'];
            $_SESSION["profile"] = $data['profile'];
            $_SESSION['ISLOGIN'] = true;
            $_SESSION["role"] = 'delivery';
            if ($data['allow'] == false) {
                header('location: logout.php');
            }else{
                header('location: index.php');
            }
        }else if ($admin->num_rows > 0) {
            $data = $admin->fetch_assoc();
            $_SESSION["id"] = $data['id'];
            $_SESSION["profile"] = $data['profile'];
            $_SESSION['ISLOGIN'] = true;
            $_SESSION["role"] = 'admin';
            header('location: index.php');
        }else{
            echo 'ไม่พบผู้ใช้งาน';
        }


    }
}
?>


<form method="post">
        <h2 class="mb-4">Login</h2>
        <p>Username</p>
        <input type="text" name="username">
        <p>Password</p>
        <div class="pass">
            <input id="password" type="password" name="password">
            <img id="eye" onclick="showHide()" src="image/icon/show.png" width="23px">
        </div>
        <button class="rounded-pill my-3 px-3" type="submit">Login</button>
        <p class="text-secondary">Not have an account? <a style="color: #fa654d;" href="register.php">Register</a></p>
    </form>
    <script src="js/eye.js"></script>



</body>
</html>l