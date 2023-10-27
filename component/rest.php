<?php

function rests($qr)
{
    foreach ($qr as $data) { ?>
        <div>
            <a href="rest.php?id=<?php echo $data['id'] ?>" class="text-dark text-decoration-none">
                <div class="content gap-2">
                    <div class="content-img">
                        <img src="assets/profile/<?php echo $data['profile'] ?>.jpg" alt="">
                    </div>
                    <div class="content-detail">
                        <h3>
                            <?php echo $data['rest_name'] ?>
                        </h3>
                        <p class="text-secondary">ประเภทร้าน :
                            <?php echo $data['rest_type'] ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    <?php }
}

?>