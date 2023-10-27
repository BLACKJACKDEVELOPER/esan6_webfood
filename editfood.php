<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT FOOD</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php include('component/header.php'); ?>
<!-- SERVER -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $foodname = $_POST['foodname'];
    $des = $_POST['des'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    if (!$foodname || !$des || !$type || !$price) {
        echo 'ว่าง';
    }else{
        // UPDATE
        db('UPDATE foods SET foodname="'.$foodname.'",
        des="'.$des.'",
        type="'.$type.'",
        price='.$price.'
         WHERE id='.$_GET['id'].';');
         if ($data != "false") {
            $name = rand();
            $bin = base64_decode($data);
            file_put_contents('assets/image/'.$name.'.jpg',$bin);
            db('UPDATE foods SET image='.$name.' WHERE id='.$_GET['id'].';');
         }
    }

}
?>


<!-- FIND FOOD -->
<?php $food = db('SELECT * FROM foods WHERE id='.$_GET['id'].';')->fetch_assoc(); ?>
    <!-- <center>
        <form method="post">
            
            <input type="file" onchange="getfile()"> 
            <input value="false" style="display:none;" type="text" id="data" name="data">
            
            <input value="<?php echo $food['foodname'] ?>" name="foodname" type="text" placeholder="ชื่ออาหาร">
            <input value="<?php echo $food['des'] ?>" name="des" type="text" placeholder="คำอธิบาย">

            <input name="price" type="number" min="1" value="<?php echo $food['price'] ?>" placeholder="ราคาอาหาร">
            <button type="submit">SAVE</button>
        </form>
    </center> -->

    

    <form method="post" class="profile-container">
        <h2>Food edit</h2>
        <hr>
        <div class="profile gap-5">
            <div class="profile-img gap-3">
            <img src="assets/image/<?php echo $food['image'] ?>.jpg" id="image" alt="">
            <input type="file" onchange="getfile()"> 
            <input value="false" style="display:none;" type="text" id="data" name="data">
            </div>
            <div class="profile-detail">
                <div class="detail">
                    <p>Name</p>
                    <p>:</p>
                    <p>
                        <input type="text" value="<?php echo $food['foodname'] ?>" name="foodname">
                    </p>
                </div>
                <div class="detail">
                    <p>Price</p>
                    <p>:</p>
                    <p>
                        <input name="price" type="number" min="1" value="<?php echo $food['price'] ?>">
                    </p>
                </div>
                <div class="detail">
                    <p>Description</p>
                    <p>:</p>
                    <p>
                        <input type="text" value="<?php echo $food['des'] ?>" name="des">
                    </p>
                </div>
                <div class="detail">
                    <p>Type food</p>
                    <p>:</p>
                    <p>
                    <select name="type" id="">

<!-- FIND TYPE -->
<?php $type = db('SELECT * FROM typefood WHERE rest_id='.$_SESSION['REST'].';');
if ($type->num_rows > 0) {
    foreach ($type as $data) { ?>

<option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>

    <?php }
} ?>

</select>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="rounded-pill px-3">Save</button>
        </div>
</form>

</body>
<script src="assets/js/postfood.js"></script>
</html>