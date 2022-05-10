<?php
	include 'inc/header.php';
?>
<?php
    if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['catId'];
    }
//    if($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $catname = $_POST['catName'];
//        $updateCat = $cat->update_category($catname, $id);
//    }
?>
<div class="main">
    <div class="content">
    	<div class="content_top">
            <?php
                $getCatName = $cat->get_name_by_cat($id);
                if($getCatName){
                    while ($result_get_catName = $getCatName->fetch_assoc()){
            ?>
    		<div class="heading">
    		    <h3>Category: <?php echo $result_get_catName['catName'] ?></h3>
    		</div>
            <?php
                    }
                }
            ?>
    		<div class="clear"></div>
    	</div>
        <div class="section group">
            <?php
                $productByCat = $cat->get_product_by_cat($id);
                if($productByCat){
                    while ($result_product_by_cat = $productByCat->fetch_assoc()){
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="details.php?productId=<?php echo $result_product_by_cat['productId'] ?>"><img src="admin/uploads/<?php echo $result_product_by_cat['image'] ?>" width="200px" alt="" /></a>
                <h2><?php echo $result_product_by_cat['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result_product_by_cat['product_description'], 100) ?></p>
                <p><span class="price"><?php echo $result_product_by_cat['price'] ?>$</span></p>
                <div class="button"><span><a href="details.php?productId=<?php echo $result_product_by_cat['productId'] ?>" class="details">Details</a></span></div>
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