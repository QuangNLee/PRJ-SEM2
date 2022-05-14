<?php 
	include 'inc/header.php';
?>
<?php
	if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
        echo "<script>window.location ='404.php'</script>";
    } else {
        $id = $_GET['productId'];
    }
	$customer_id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
        $addToCart = $cart->add_to_cart($quantity,$id);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
        $productid = $_POST['productid'];
        $insert_compare = $cart->insertCompare($productid,$customer_id);
    }
?>
<div class="main">
    <div class="content">
    	<div class="section group">
			<?php
				$get_product_details = $product->get_details($id);
				if($get_product_details){
					while ($result_details = $get_product_details->fetch_assoc()) {
			?>
			<div class="cont-desc span_1_of_2">				
				<div class="grid images_3_of_2">
					<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?></h2>				
					<p><?php echo $fm->textShorten($result_details['product_description'], 200) ?></p>
					<div class="price">
						<p>Price: <span><?php echo $result_details['price']."$" ?></span></p>
						<p>Category: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName'] ?></span></p>
				</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
					<?php
						if(isset($addToCart)){
							echo '<span style="color: red; font-size: 18px;">Product already exists in cart</span>';
						}
					?>
				</div>
                <div class="add-cart">
                    <form action="" method="POST">
                        <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>
                        <?php
                            $login_check = Session::get('customer_login');
                            if($login_check){
                                echo '<input type="submit" class="buysubmit" name="compare" value="Compare Product"/> ';
                                echo '<input type="submit" class="buysubmit" name="flist" value="Save to favorite list"/>';
                            } else {
                                echo '';
                            }
                        ?>
                        <?php
                            if(isset($insert_compare)){
                                echo $insert_compare;
                            }
                        ?>
                    </form>
                </div>
			</div>
			<div class="product-desc">
				<h2>Product Details</h2>
				<p><?php echo $result_details['product_description'] ?></p>
			</div>
			<?php
					}
				}
			?>
		</div>
		<div class="rightsidebar span_3_of_1">
			<h2>CATEGORIES</h2>
			<ul>
                <?php
                    $getAll_category = $cat->getAll_category();
                    if($getAll_category){
                        while ($result_getAll = $getAll_category->fetch_assoc()){
                ?>
				<li><a href="productbycat.php?catId=<?php echo $result_getAll['catId'] ?>"><?php echo $result_getAll['catName'] ?></a></li>
				<?php
                        }
                    }
                ?>
			</ul>
		</div>
	</div>
</div>
<?php
	include 'inc/footer.php';
?>