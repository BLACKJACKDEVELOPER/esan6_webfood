<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTER</title>
</head>
<body>
    <?php include('component/header.php'); ?>
    

    <center>
        <h1>สรุปยอดขาย</h1>

<!-- DAY -->
        <div>
            <h3>รายวัน</h3>
            <div>
                <?php $day = db('SELECT sum(price * amount) AS DATA , DATE_FORMAT(date,"%d") AS TIMER FROM orders WHERE status=1 AND rest_id='.$_SESSION['REST'].' GROUP BY DATE_FORMAT(date,"%d");');
                foreach ($day as $data) { ?>
                    <div>
                        <h3>วันที่ : <?php echo $data['TIMER'] ?> รวม <?php echo $data['DATA'] ?></h3>
                    </div>
                <?php } ?>
            </div>
        </div>

<!-- MOUTH -->
<div>
            <h3>รายเดือน</h3>
            <div>
                <?php $day = db('SELECT sum(price * amount) AS DATA , DATE_FORMAT(date,"%m") AS TIMER FROM orders WHERE status=1 AND rest_id='.$_SESSION['REST'].' GROUP BY DATE_FORMAT(date,"%m");');
                foreach ($day as $data) { ?>
                    <div>
                        <h3>เดือนที่ : <?php echo $data['TIMER'] ?> รวม <?php echo $data['DATA'] ?></h3>
                    </div>
                <?php } ?>
            </div>
        </div>
<!-- YEAR -->
<div>
            <h3>รายปี</h3>
            <div>
                <?php $day = db('SELECT sum(price * amount) AS DATA , DATE_FORMAT(date,"%Y") AS TIMER FROM orders WHERE status=1 AND rest_id='.$_SESSION['REST'].' GROUP BY DATE_FORMAT(date,"%y");');
                foreach ($day as $data) { ?>
                    <div>
                        <h3>ปี่ : <?php echo $data['TIMER'] ?> รวม <?php echo $data['DATA'] ?></h3>
                    </div>
                <?php } ?>
            </div>
        </div>

    </center>

</body>
</html>