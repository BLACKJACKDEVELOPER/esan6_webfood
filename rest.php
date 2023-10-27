<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANT</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/rest.css">
</head>
<body>
    <?php include('component/header.php'); ?>
<!-- SERVER -->
<?php if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['typerest'];
    db('UPDATE restaurant SET rest_name="'.$name.'",
    rest_type="'.$type.'" WHERE id='.$_SESSION['REST'].';');
} ?>
     <!-- container -->
     <div class="rest-container">

     <!-- FIND REST -->
     <?php $rest = db('SELECT manager.profile , restaurant.rest_name,restaurant.rest_type FROM restaurant INNER JOIN manager ON restaurant.m_id=manager.id AND restaurant.id = '.$_GET['id'].';');
    if ($rest->num_rows > 0) { 
        $rest = $rest->fetch_assoc();
        // CHECK IF OWNER
        if (isset($_SESSION['REST']) && $_SESSION['REST'] == $_GET['id']) {; ?>

<!-- head -->
<div class="rest-head">
    <div class="rest-img">
        <img class="rounded-pill" src="assets/profile/<?php echo $rest['profile'] ?>.jpg">
    </div>
    <form method="post" class="rest-detail gap-2">
        <h1><input name="name" class="rest-name" type="text" value="<?php echo $rest['rest_name'] ?>"></h1>
        <h3>
            ประเภทร้าน :
            <h3>
        <!-- TYPE OF REST -->
        <select name="typerest" id="">
            <?php $type = db('SELECT * FROM resttype;');
            if ($type->num_rows > 0) {
                foreach ($type as $data) { ?>
<?php if ($data['type'] == $rest['rest_type']) { ?>
    <option selected value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
<?php }else { ?>
    <option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
<?php } ?>
                <?php }
            } ?>
        </select>
    </h3>
        </h3>
        <div>
            <button class="rounded-pill px-3">Save</button>
        </div>
    </form>
    <a class="add-food text-light" href="postfood.php">Add food</a>
    <a class="add-dis text-light" href="postdiscount.php">Add discount</a>
    <a class="add-type text-light" href="posttypefood.php">Add food type</a>
    <a class="add-report text-light" href="reporter.php">Report</a>
</div>
<!-- head -->


        <?php }else{ ?>

<!-- head -->
<div class="rest-head">
    <div class="rest-img">
        <img class="rounded-pill" src="assets/profile/<?php echo $rest['profile'] ?>.jpg">
    </div>
    <form method="post" class="rest-detail gap-2">
        <h1><?php echo $rest['rest_name'] ?></h1>
        <h3>
            ประเภทร้าน : <?php echo $rest['rest_type']; ?>
        </h3>
        </h3>
    </form>
</div>
<!-- head -->


        <?php } 

    } ?>    
     

<!-- filter -->
<div class="filter gap-2">
    <h4>หมวดหมู่</h4>
    <select onchange="window.location.href = 'rest.php?id=<?php echo $_GET['id'] ?>&typefood='+event.target.value;">
                <!-- LOAD TYPE -->
                <?php $type = db('SELECT * FROM typefood WHERE rest_id='.$_GET['id'].';');
        if ($type->num_rows > 0) {
            foreach ($type as $data) { ?>

<?php if ($data['type'] == $_GET['typefood']) { ?>
    <option selected value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
<?php }else{ ?>
    <option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
<?php } ?>

            <?php }
        } ?>
    </select>
</div>
<!-- filter -->


<!-- body -->
<div class="rest-body">
    <h2 class="mb-4">รายการอาหาร</h2>
    <div class="menu-container">

<!-- LOAD FOOD ONWER -->
<?php
include('component/foods.php');
if (isset($_GET['typefood'])) {
    $foods = db('SELECT * FROM foods WHERE rest_id='.$_GET['id'].' AND type="'.$_GET['typefood'].'";');
    if ($foods->num_rows > 0) {
        foods($foods);
    }
}else{
    $foods = db('SELECT * FROM foods WHERE rest_id='.$_GET['id'].';');
    if ($foods->num_rows > 0) {
        foods($foods);
    }
}
?>

    </div>
</div>
<!-- body -->





</div>
<!-- container -->
</body>
</html>