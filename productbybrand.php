<?php
    include 'inc/header.php';
?>
<?php
    if(!isset($_GET['brandId']) || $_GET['brandId'] == NULL){
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['brandId'];
    }
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <?php
            $getNameBrand = $brand->getNameByBrandId($id);
            if($getNameBrand){
                while ($result_name = $getNameBrand->fetch_assoc()){
                    ?>
                    <div class="heading">
                        <h3>Brand: <?php echo $result_name['brandName'] ?></h3>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
                $productByBrandId = $product->productByBrandId($id);
                if($productByBrandId){
                    while ($result_product = $productByBrandId->fetch_assoc()){
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="details.php?productId=<?php echo $result_product['productId'] ?>"><img src="admin/uploads/<?php echo $result_product['image'] ?>" width="200px" alt="" /></a>
                <h2><?php echo $fm->textShorten($result_product['productName'], 100) ?></h2>
                <p><?php echo $fm->textShorten($result_product['product_description'], 100) ?></p>
                <p><span class="price"><?php echo $fm->format_currency($result_product['price']) ?>$</span></p>
                <div class="button"><span><a href="details.php?productId=<?php echo $result_product['productId'] ?>" class="details">Details</a></span></div>
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