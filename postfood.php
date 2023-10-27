<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST FOOD</title>
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
    if ($data == "false" || !$foodname || !$des || !$type || !$price) {
        echo 'ว่าง';
    }else{
        // INSERT INTP DATABASE
        $name = rand();
        $bin = base64_decode($data);
        file_put_contents("assets/image/".$name.".jpg",$bin);
        db('INSERT INTO foods(foodname,des,type,price,rest_id,image) VALUES 
        ("'.$foodname.'","'.$des.'","'.$type.'","'.$price.'",'.$_SESSION['REST'].','.$name.');');
        echo "เพิ่มสำเร็จ";
    }

}
?>



    <!-- <center>
        <form method="post">
            <img src=""  alt="">

            
            <input name="foodname" type="text" placeholder="ชื่ออาหาร">
            <input name="des" type="text" placeholder="คำอธิบาย">

            <input  type="number" min="1" value="1" placeholder="ราคาอาหาร">
            <button type="submit">ADD</button>
        </form>
    </center> -->


<!-- NEW -->
<form method="post" class="profile-container">
        <h2>Food edit</h2>
        <hr>
        <div class="profile gap-5">
            <div class="profile-img gap-3">
                <img id="image" src="image/menu/cafe/hot/h-am.jpg">
                <input type="file" onchange="getfile()"> 
                <input value="false" style="display:none;" type="text" id="data" name="data">
            </div>
            <div class="profile-detail">
                <div class="detail">
                    <p>Name</p>
                    <p>:</p>
                    <p>
                        <input type="text" name="foodname">
                    </p>
                </div>
                <div class="detail">
                    <p>Price</p>
                    <p>:</p>
                    <p>
                        <input name="price" type="number" min="1">
                    </p>
                </div>
                <div class="detail">
                    <p>Description</p>
                    <p>:</p>
                    <p>
                        <input name="des" type="text">
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