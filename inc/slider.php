<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
                $getLastestIP = $product->getLastestIP();
                if($getLastestIP){
                    while ($resultIP = $getLastestIP->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $resultIP['productId'] ?>"> <img src="admin/uploads/<?php echo $resultIP['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>IPhone</h2>
                    <p><?php echo $resultIP['productName'] ?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $resultIP['productId'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <?php
                $getLastestSS = $product->getLastestSamsung();
                if($getLastestSS){
                    while ($resultSS = $getLastestSS->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $resultSS['productId'] ?>"> <img src="admin/uploads/<?php echo $resultSS['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Samsung</h2>
                    <p><?php echo $resultSS['productName'] ?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $resultSS['productId'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="section group">
            <?php
                $getLastestOP = $product->getLastestOppo();
                if($getLastestOP){
                    while ($resultOP = $getLastestOP->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $resultOP['productId'] ?>"> <img src="admin/uploads/<?php echo $resultOP['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Oppo</h2>
                    <p><?php echo $resultOP['productName'] ?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $resultOP['productId'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <?php
                $getLastestXM = $product->getLastestXiaomi();
                if($getLastestXM){
                    while ($resultXM = $getLastestXM->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?productId=<?php echo $resultXM['productId'] ?>"> <img src="admin/uploads/<?php echo $resultXM['image'] ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Xiaomi</h2>
                    <p><?php echo $resultXM['productName'] ?></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $resultXM['productId'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                        $get_slider = $slider->show_slider();
                        if($get_slider){
                            while ($result_slider = $get_slider->fetch_assoc()){
                    ?>
                    <li><img src="admin/uploads/<?php echo $result_slider['image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" /></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>