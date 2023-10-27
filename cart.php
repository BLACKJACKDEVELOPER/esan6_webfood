<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php include('component/header.php'); ?>
    <!-- SERVER -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment = rand();
    $minecart = db('SELECT * FROM viewcart WHERE c_id='.$_SESSION['id'].';');
    foreach ($minecart as $data) {
        db('INSERT INTO orders(c_id,rest_id,foodname,price,amount,date,payment_method,payment_number) values 
        ('.$_SESSION['id'].','.$data['rest_id'].',"'.$data['foodname'].'",'.$data['price'].','.$data['amount'].',CURDATE(),"โอนชำระ",'.$payment.')');
    }
    db('DELETE FROM viewcart WHERE c_id='.$_SESSION['id'].';');
} ?>



<!-- HISTORY ORDERS -->
<a href="history.php" class="btn btn-danger">ประวัติการสั่งซื้อ</a>


<div class="cart-container">
        <h2>My Cart</h2>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th class="w-25">Name</th>
                    <th class="w-25">Price</th>
                    <th class="w-25">Amount</th>
                    <th class="w-25">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php $cart = db('SELECT * FROM viewcart WHERE c_id='.$_SESSION['id'].';');
            $total = 0;
            $piece = 0;
        if ($cart->num_rows > 0) {
            foreach ($cart as $data) {
                $total = $total + ($data['amount'] * $data['price']);
                $piece = $piece + $data['amount']; ?>
                
                <tr>
                    <td><?php echo $data['foodname'] ?></td>
                    <td><?php echo $data['price'] ?></td>
                    <td><?php echo $data['amount'] ?></td>
                    <td><?php echo $data['amount'] * $data['price'] ?></td>
                </tr>
                <?php } } ?>
            </tbody>

        </table>
    </div>

    
<!-- NEW -->
<div class="payment-container">
        <div class="discount">
            <h4>โค้ดส่วนลด</h4>
            <input id="discount" type="text">
            <div>
                <button onclick="window.location.href = 'cart.php?code='+document.getElementById('discount').value;" class="payment-btn rounded-pill">Submit</button>
            </div>
        </div>
        <div></div>
        <div class="payment gap-3">
            <?php if (isset($_GET['code'])) {
                $percent = db('SELECT * FROM discount WHERE code="'.$_GET['code'].'";');
                if ($percent->num_rows > 0) {
                    $percent = db('SELECT * FROM discount WHERE code="'.$_GET['code'].'";')->fetch_assoc();
                    $total = $total * (100 - $percent['percent']) / 100; 
                }
                ?>
                <h3>รวม (<?php echo $piece ?> ชิ้น) ราคา <?php echo $total ?> บาท</h3>
            <?php }else{ ?>
                <h3>รวม (<?php echo $piece ?> ชิ้น) ราคา <?php echo $total ?> บาท</h3>
            <?php } ?>
            <button class="payment-btn rounded-pill" onclick="showcard()">ชำระเงิน</button>
        </div>
    </div>
    <form method="post" style="display:none;" class="credit gap-3" id="carder">
        <h3>เลขบัตรเครดิต</h3>
        <input class="credit-input" type="text">
        <div>
            <button class="rounded-pill px-3">ยืนยัน</button>
        </div>
    </form>
</div>

</body>
<script>

function showcard() {
    document.getElementById('carder').style.display = "block"
}

</script>
</html>