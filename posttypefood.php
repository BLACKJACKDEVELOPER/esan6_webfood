<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food type</title>
    <link rel="stylesheet" href="css/reglog.css">
    <link rel="stylesheet" href="css/foodtype.css">
</head>
<body>
    <?php include('component/header.php'); ?>
<!-- SERVER -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    if (!$type) {
        echo " ว่าง";
    }else{
        // INSERT
        db('INSERT INTO typefood(type,rest_id) VALUES 
        ("'.$type.'",'.$_SESSION['REST'].');');
    }
} ?>


        <form method="post">
            <h2 class="mb-4">เพิ่มหมวดหมู่อาหาร</h2>
            <input name="type" type="text" placeholder="เพิ่มหมวดหมู่อาหาร">
            <button class="rounded-pill px-3" type="submit">Add</button>
        </form>



        <!-- TYPELOAD -->
        <div class="type-container">
            <h2>หมวดหมู่อาหารทั้งหมด</h2>
            <hr>
            <div class="type">
                <div class="type-list">
                    <?php $type = db('SELECT * FROM typefood WHERE rest_id='.$_SESSION['REST'].';');
                    if ($type->num_rows > 0) {
                        foreach ($type as $data) { ?>
                    <div>
                        <h3><?php echo $data['type'] ?></h3>
                        <a class="del rounded-pill text-light px-3" href="api/deltypefood.php?id=<?php echo $data['id'] ?>">ลบ</a>
                    </div>
                    <hr>
                    <?php } 
                    } ?>
                </div>
            </div>
        </div>
    
</body>
</html>