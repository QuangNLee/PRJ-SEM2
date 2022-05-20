<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include '../controller/brandController.php';
	include '../controller/categoryController.php';
	include '../controller/productController.php';
	include_once '../helpers/format.php';
?>
<?php
	$prod = new productController();
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
					<th width="5%">No.</th>
					<th width="20%">Product Name</th>
					<th width="5%">Category</th>
					<th width="5%">Brand</th>
					<th width="25%">Description</th>
					<th width="5%">Type</th>
					<th width="5%">Product Price</th>
					<th width="10%">Image</th>
                    <th width="10%">Status</th>
					<th width="10%">Action</th>
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
								echo '<span style="color: blue">Featured</span>';
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
                            echo '<span style="color: green">Available</span>';
                        } else {
                            echo '<span style="color: red">Not available</span>';
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
