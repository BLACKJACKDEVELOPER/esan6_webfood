<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php include('component/header.php'); ?>
    <!-- SERVER -->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = $_POST['data'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    if (!$username || !$fullname || !$address || !$password) {
        echo 'ว่าง';
    }else{
        // UPDATE 
        if ($data != 'false') {
            $bin = base64_decode($data);
            file_put_contents('assets/profile/'.$_SESSION['id'].'.jpg',$bin);
            db('UPDATE '.$_SESSION['role'].' SET profile='.$_SESSION['id'].' WHERE id='.$_SESSION['id'].';');
            $_SESSION['profile'] = $_SESSION['id'];
         }
         
        db('UPDATE '.$_SESSION['role'].' SET username="'.$username.'",
        fullname="'.$fullname.'",
        address="'.$address.'",
        password="'.$password.'" WHERE id="'.$_SESSION['id'].'";');

    }
}

?>



<?php $profile = db('SELECT * FROM '.$_SESSION['role'].' WHERE id='.$_SESSION['id'].';')->fetch_assoc(); ?>


<!-- NEW -->
<form method="post" class="profile-container">
        <h2>My Profile</h2>
        <hr>
        <div class="profile gap-5">
            <div class="profile-img gap-3">
                <img id="profile" src="image/icon/<?php echo $profile['profile'] ?>.png">
                <input type="file" onchange="getfile()" >
                <input value="false" type="text" id="data" name="data" style="display:none">
            </div>
            <div class="profile-detail">
                <div class="detail">
                    <p>Username</p>
                    <p>:</p>
                    <p>
                        <input name="username" type="text" value="<?php echo $profile['username'] ?>">
                    </p>
                </div>
                <div class="detail">
                    <p>Fullname</p>
                    <p>:</p>
                    <p>
                        <input name="fullname" type="text" value="<?php echo $profile['fullname'] ?>">
                    </p>
                </div>
                <div class="detail">
                    <p>Address</p>
                    <p>:</p>
                    <p>
                        <input name="address" type="text" value="<?php echo $profile['address'] ?>">
                    </p>
                </div>
                <div class="detail">
                    <p>Password</p>
                    <p>:</p>
                    <p>
                        <input name="password" type="text" value="<?php echo $profile['password'] ?>">
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="rounded-pill px-3">Save</button>
        </div>
</form>

</body>
<script src="assets/js/profile.js"></script>
</html>