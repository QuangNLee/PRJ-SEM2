<?php
    include 'inc/header.php';
?>
<div class="main">
        <div class="content">
            <div class="content_top">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $keyword = $_POST['keyword'];
                        $search_product = $product->search_product($keyword);
                    }
                ?>
                <div class="heading">
                    <h3>Keyword: <?php echo $keyword ?></h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php
                    if($search_product){
                        while ($result = $search_product->fetch_assoc()){
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="details.php?productId=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200px" alt="" /></a>
                    <h2><?php echo $result['productName'] ?></h2>
                    <p><?php echo $fm->textShorten($result['product_description'], 100) ?></p>
                    <p><span class="price"><?php echo $fm->format_currency($result['price']) ?>$</span></p>
                    <div class="button"><span><a href="details.php?productId=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
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