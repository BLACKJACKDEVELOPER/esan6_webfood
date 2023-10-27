<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
</head>
<body>
    <?php include('component/header.php'); ?>
    <center>
<h1>ประวัติการสั่งซื้อ</h1>
    </center>
    
    <center>
    <div>
<!-- LOAD DETAIL -->
<?php $his = db('SELECT orders.payment_number,orders.d_id,customer.fullname,customer.address,orders.payment_method FROM orders INNER JOIN
 customer ON orders.c_id=customer.id AND status=true AND c_id='.$_SESSION['id'].' GROUP BY orders.payment_number;');
 if ($his->num_rows > 0) {
    foreach ($his as $data) { ?>


<div style="margin-top:5%;">
        <h3>เลขคำสั่งซื้อ : <?php echo $data['payment_number'] ?></h3>
        <h3>ชื่อผู้สั่ง : <?php echo $data['fullname'] ?></h3>
        <h3>ที่อยู่ : <?php echo $data['address'] ?></h3>
        <h3>ประเภทการชำระ : <?php echo $data['payment_method'] ?></h3>
        <div>
            <!-- LOAD DETAIL ORDER -->
            <?php $detail = db('SELECT * FROM orders WHERE payment_number='.$data['payment_number'].';');
            foreach ($detail as $de) { ?>
                <div style="display:flex;justify-content:space-around;max-width:20%;">
                    <h4>ชื่ออาหาร : <?php echo $de['foodname'] ?></h4>
                    <h4>ราคา : <?php echo $de['price'] ?></h4>
                    <h4>จำนวน : <?php echo $de['amount'] ?></h4>
                    <h4>รวม : <?php echo $de['amount'] * $de['price'] ?></h4>
                </div>
            <?php } ?>
        </div>
    </div>

    <h3>ผู้ส่งอาหาร : <?php echo db('SELECT * FROM delivery WHERE id='.$data['d_id'].';')->fetch_assoc()['fullname']; ?></h3>

    <?php }
 } ?>
    </div>
    </center>
    
</body>
</html>