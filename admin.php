<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="icon" href="image/logo/Logo.ico">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php include('component/header.php'); ?>
    <div style="display:flex;flex-direction:row;justify-content:space-around;;">
<!-- NEW -->
    <div class="table-account">
    <div class="table-user">
            <h2 class="mb-4">ผู้ใช้ทั้งหมด</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Allow</th>
                    </tr>
                </thead>
                <tbody>
                <?php $customer = db('SELECT * FROM customer');
            if ($customer->num_rows > 0) {
                foreach ($customer as $data) { ?>
                    <tr>
                        <td><img width="50px" src="assets/profile/<?php echo $data['profile'] ?>.jpg" alt=""></td>
                        <td> <?php echo $data['username'] ?></td>
                        <td><?php echo $data['fullname'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['allow'] == false ? '<a class="allow rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=true&role=customer">อนุญาต</a>' : '<a class="deny rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=false&role=customer">ไม่อนุญาต</a>' ?></td>
                </tr>
                <?php }
            } ?>
                </tbody>
            </table>
        </div>

        <!-- MANAGER -->
        <div class="table-user">
            <h2 class="mb-4">ผู้จัดการร้านอาหารทั้งหมด</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Allow</th>
                    </tr>
                </thead>
                <tbody>
                <?php $manager = db('SELECT * FROM manager');
            if ($manager->num_rows > 0) {
                foreach ($manager as $data) { ?>
                    <tr>
                        <td><a href="rest.php?id=<?php echo db('SELECT id FROM restaurant WHERE m_id='.$data['id'].';')->fetch_assoc()['id'] ?>"><img width="50" src="assets/profile/<?php echo $data['profile'] ?>.jpg" alt=""></a></td>
                        <td> <?php echo $data['username'] ?></td>
                        <td><?php echo $data['fullname'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['allow'] == false ? '<a class="allow rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=true&role=manager">อนุญาต</a>' : '<a class="deny rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=false&role=manager">ไม่อนุญาต</a>' ?></td>
                </tr>
                <?php }
            } ?>
                </tbody>
            </table>
        </div>

        <!-- DELIVERY -->
        <div class="table-user">
            <h2 class="mb-4">ผู้ส่งอาหารทั้งหมด</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Allow</th>
                    </tr>
                </thead>
                <tbody>
                <?php $delivery = db('SELECT * FROM delivery');
            if ($delivery->num_rows > 0) {
                foreach ($delivery as $data) { ?>
                    <tr>
                        <td><img width="50px" src="assets/profile/<?php echo $data['profile'] ?>.jpg" alt=""></td>
                        <td> <?php echo $data['username'] ?></td>
                        <td><?php echo $data['fullname'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['allow'] == false ? '<a class="allow rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=true&role=delivery">อนุญาต</a>' : '<a class="deny rounded-pill px-3" href="api/allow.php?id='.$data['id'].'&allow=false&role=delivery">ไม่อนุญาต</a>' ?></td>
                </tr>
                <?php }
            } ?>
                </tbody>
            </table>
        </div>

    </div> 
    </div>


    <br>
    <br>

<!-- SERVER -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    if (!$type) {
        echo 'ว่าง';
    }else{
        //INSERT INTO
        db('INSERT INTO resttype(type) VALUES 
        ("'.$type.'");');
    }
}
?>

<!-- REST TYPE -->
    <div class="resttype">
        <form method="post" class="typeadd">
            <h2 class="mb-4">สร้างประเภทร้านอาหาร</h2>
            <input name="type" class="mb-4" type="text" placeholder="กรอกประเภทร้านอาหารที่ต้องการสร้าง">
            <div>
                <button class="rounded-pill" type="submit">Submit</button>
            </div>
        </form>
        <div class="typelist">
        <?php $type = db('SELECT * FROM resttype');
    if ($type->num_rows > 0) {
        foreach ($type as $data) { ?>
            <div class="list">
                <h4><?php echo $data['type'] ?></h4>
                <a class="deny rounded-pill" href="api/delresttype.php?id=<?php echo $data['type'] ?>">Delete</a>
            </div>
            <?php }
        } ?>
        </div>
    </div>


    <!-- TYPE REST -->
</body>
</html>