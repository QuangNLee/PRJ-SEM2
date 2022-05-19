<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include '../classes/brand.php';
?>
<?php
    $brand = new brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Brands List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Brand Name</th>
                    <th>Status</th>
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
                    <td>
                        <?php
                            if($result['status'] == 1){
                                echo '<span style="color: green">Available</span>';
                            } else {
                                echo '<span style="color: red">Not available</span>';
                            }
                        ?>
                    </td>
                    <td><a href="brandedit.php?brandId=<?php echo $result['brandId'] ?>">Edit</a>
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

