<?php
	include 'inc/header.php';
?>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Mobile</h3>
    		</div>
    		<div class="clear"></div>
        </div>
        <div class="section group">
            <?php
                $get_all_mobile = $product->get_all_mobile();
                if($get_all_mobile){
                    while($result_mobile = $get_all_mobile->fetch_assoc()){
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                 <a href="details.php?productId=<?php echo $result_mobile['productId'] ?>"><img src="admin/uploads/<?php echo $result_mobile['image'] ?>" height="100px" alt="" /></a>
                 <h2><?php echo $result_mobile['productName'] ?></h2>
                 <p><?php ?></p>
                 <p><span class="price"><?php echo $result_mobile['price'] ?> $</span></p>
                 <div class="button"><span><a href="details.php?productId=<?php echo $result_mobile['productId'] ?>" class="details">Details</a></span></div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Laptop</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_laptop = $product->get_all_laptop();
            if($get_all_laptop){
                while($result_laptop = $get_all_laptop->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_laptop['productId'] ?>"><img src="admin/uploads/<?php echo $result_laptop['image'] ?>" height="120px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_laptop['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_laptop['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_laptop['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Accessory</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_accessory = $product->get_all_accessory();
            if($get_all_accessory){
                while($result_accessory = $get_all_accessory->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_accessory['productId'] ?>"><img src="admin/uploads/<?php echo $result_accessory['image'] ?>" height="120px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_accessory['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_accessory['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_accessory['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Tablet</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_tablet = $product->get_all_tablet();
            if($get_all_tablet){
                while($result_tablet = $get_all_tablet->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_tablet['productId'] ?>"><img src="admin/uploads/<?php echo $result_tablet['image'] ?>" height="160px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_tablet['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_tablet['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_tablet['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Smart device</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_smartDevice = $product->get_all_smartDevice();
            if($get_all_smartDevice){
                while($result_smartDevice = $get_all_smartDevice->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_smartDevice['productId'] ?>"><img src="admin/uploads/<?php echo $result_smartDevice['image'] ?>" height="160px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_smartDevice['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_smartDevice['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_smartDevice['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Smart watch</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_smartWatch = $product->get_all_smartWatch();
            if($get_all_smartWatch){
                while($result_smartWatch = $get_all_smartWatch->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_smartWatch['productId'] ?>"><img src="admin/uploads/<?php echo $result_smartWatch['image'] ?>" height="160px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_smartWatch['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_smartWatch['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_smartWatch['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Fashion watch</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $get_all_fashionWatch = $product->get_all_fashionWatch();
            if($get_all_fashionWatch){
                while($result_fashionWatch = $get_all_fashionWatch->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?productId=<?php echo $result_fashionWatch['productId'] ?>"><img src="admin/uploads/<?php echo $result_fashionWatch['image'] ?>" height="160px" alt="" /></a>
                        <h2><?php echo $fm->textShorten($result_fashionWatch['productName'],100) ?></h2>
                        <p><?php ?></p>
                        <p><span class="price"><?php echo $result_fashionWatch['price'] ?> $</span></p>
                        <div class="button"><span><a href="details.php?productId=<?php echo $result_fashionWatch['productId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
	include 'inc/footer.php';
?>