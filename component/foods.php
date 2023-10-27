<?php

function foods($qr) {
    foreach ($qr as $data) { ?>

<!-- <div>
        <img  alt="">
        <h3></h3>
        <h3>ประเภทอาหาร : </h3>
        <a href="api/add.php?id=<?php echo $data['id'] ?>">ราคา : </a>


</div> -->

<!-- NEW -->
        <!--  -->
        <button onclick="window.location.href = 'api/add.php?id=<?php echo $data['id'] ?>';" class="menu gap-2">
            <img src="assets/image/<?php echo $data['image'] ?>.jpg">
            <div class="menu-detail-container text-start">
                <div class="menu-detail">
                    <h5><?php echo $data['foodname']; ?></h5>
                    <h6>หมวดหมู่ : <?php echo $data['type']; ?></h6>
                    <p class="text-secondary"><?php echo $data['des']; ?></p>
                </div>
                <div class="menu-price">
                    <h2>ราคา : <?php echo $data['price']; ?></h2>
                    <div class="add">
                        <img src="image/icon/add.png" width="30px">
                    </div>
                </div>
            </div>
            <?php 
            if (isset($_SESSION['REST']) && $_SESSION['REST'] == $_GET['id']) { ?>
                <a class="edit text-light" href="editfood.php?id=<?php echo $data['id'] ?>">Edit</a>
                <a class="del text-light" href="api/delfood.php?id=<?php echo $data['id'] ?>">Delete</a>
            <?php }
        ?>
            <a class="view text-light" href="viewfood.php?id=<?php echo $data['id'] ?>">View</a>
            </button>


    <?php }
}

?>