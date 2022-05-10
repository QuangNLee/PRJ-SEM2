<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include '../classes/brand.php';
?>
<?php
    $brand = new brand();
	if(isset($_GET['deleteId'])){
        $id = $_GET['deleteId'];
		$deletebrand = $brand->delete_brand($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brands List</h2>
                <div class="block">
					<?php
						if(isset($deletebrand)){
							echo $deletebrand;
						}
					?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_brand = $brand->show_brand();
							if($show_brand){
								$i = 0;
								while($result = $show_brand->fetch_assoc()){
									$i++;
						?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brandName'] ?></td>
								<td><a href="brandedit.php?brandId=<?php echo $result['brandId'] ?>">Edit</a> ||
								    <a onclick="return confirm('Do you want to delete???')" 
									href="?deleteId=<?php echo $result['brandId'] ?>">Delete</a>
								</td>
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

