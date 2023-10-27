<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW FOOD</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
    <?php include('component/header.php'); ?>
<!-- SERVER -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    db('INSERT INTO review(text,f_id,c_name) VALUES 
    ("'.$comment.'",'.$_GET['id'].',"'.(db('SELECT fullname FROM customer WHERE id='.$_SESSION['id'].';')->fetch_assoc()['fullname']).'");');
} ?>


<?php $food = db('SELECT * FROM foods WHERE id='.$_GET['id'].';')->fetch_assoc(); ?>
    <div class="food-container gap-3">
        <div class="food-detail gap-3">
            <img src="assets/image/<?php echo $food['image'] ?>.jpg" alt="">
            <div class="detail">
                <h3>ชื่อ : <?php echo $food['foodname'] ?></h3>
                <h5>หมวดหมู่ : <?php echo $food['type'] ?></h5>
                <p class="text-secondary"><?php echo $food['des'] ?></p>
            </div>
        </div>
        <div class="food-comment">
            <div class="comment">
                <!--  -->
                <?php $ment = db('SELECT * FROM review WHERE f_id='.$_GET['id'].';');
                if ($ment->num_rows > 0) {
                    foreach ($ment as $data) { ?>
<div class="person gap-2">
                    <img src="image/icon/user.png">
                    <div class="d-flex flex-column">
                        <h5><?php echo $data['c_name'] ?></h5>
                        <p><?php echo $data['text'] ?></p>   
</div>
                </div>
                    <?php }
                } ?>
                
                <!--  -->
            </div>
            <form method="post" class="comment-input">
                <h5>Type some thing.</h5>
                <div class="d-flex gap-3">
                    <input name="comment" type="text" placeholder="Type...">
                    <button class="send rounded-pill px-3">Send</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>