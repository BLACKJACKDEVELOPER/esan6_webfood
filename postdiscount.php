<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add discount</title>
    <link rel="stylesheet" href="css/reglog.css">
</head>
<body>
    <?php include('component/header.php'); ?>
    <!-- SERVER -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST['code'];
        $percent = $_POST['percent'];
        if (!$code) {
            echo 'ว่าง';
        }else{
            // INSERT TO DB
            db('INSERT INTO discount(code,percent,rest_id) VALUES 
            ("'.$code.'",'.$percent.','.$_SESSION['REST'].');');
        }
    } ?>

    <form method="post">
        <h4 class="mb-3">เพิ่มโค้ดส่วนลด</h4>
        <input name="code" type="text" placeholder="เพิ่มส่วนลด...">
        <h4 class="mb-3">เปอร์เซ็นต์ส่วนลด</h4>
        <input name="percent" type="number" min="1" placeholder="เปอร์เซ็นต์...">
        <button class="rounded-pill px-3">Add</button>
    </form>

    <!-- LOAD DISCOUNT -->
    <div>
        <?php $dis = db('SELECT * FROM discount WHERE rest_id='.$_SESSION['REST'].';');
        if ($dis->num_rows > 0) {
            foreach ($dis as $data) { ?>

<div>
    <h3><?php echo $data['code'] ?></h3>
    <h3><?php echo $data['percent'] ?>%</h3>
    <a href="api/deldiscount.php?id=<?php echo $data['code'] ?>">ลบ</a>
</div>

            <?php } 
        } ?>
    </div>

</body>
</html>