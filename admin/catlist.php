﻿<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include '../controller/categoryController.php';
?>
<?php
    $cat = new categoryController();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $show_cate = $cat->show_category();
                    if($show_cate){
                        $i = 0;
                        while($result = $show_cate->fetch_assoc()){
                            $i++;
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td>
                            <?php
                            if($result['status'] == 1){
                                ?>
                                <span style="color: green">Available</span>
                                <?php
                            } else {
                                ?>
                                <span style="color: red">Not available</span>
                                <?php
                            }
                            ?>
                        </td>
                        <td><a href="catedit.php?catId=<?php echo $result['catId'] ?>">Edit</a></td>
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

