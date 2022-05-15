<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include '../classes/brand.php';
	include '../classes/category.php';
	include '../classes/product.php';
	include_once '../helper/format.php';
?>
<?php
	$prod = new product();
	$fm = new Format();
	if(isset($_GET['productId'])){
		$id = $_GET['productId'];
		$delprod = $prod->delete_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Products List</h2>
        <div class="block">
			<?php
				if(isset($delprod)){
					echo $delprod;
				}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Product Price</th>
					<th>Image</th>
                    <th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$prodlist = $prod->show_product();
					if($prodlist){
						$i = 0;
						while($result = $prodlist->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten($result['product_description'], 30) ?></td>
					<td><?php 
							if($result['type'] == 1){
								echo 'Featured';
							} else {
								echo 'Non-Featured';
							}
					    ?>
					</td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="50px"/></td>
                    <td>
                        <?php
                        if($result['status'] == 1){
                            echo 'Available';
                        } else {
                            echo 'Not available';
                        }
                        ?>
                    </td>
					<td><a href="productedit.php?productId=<?php echo $result['productId'] ?>">Edit</a></td>
				</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>
       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
