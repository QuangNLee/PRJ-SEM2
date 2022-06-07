<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../controller/sliderController.php';
?>
<?php
    $slider = new sliderController();
    if(isset($_GET['change_type']) && isset($_GET['type'])){
        $id = $_GET['change_type'];
        $type = $_GET['type'];
        $update_type = $slider->update_type($id,$type);
    }
    if(isset($_GET['del_slider'])){
        $id = $_GET['del_slider'];
        $del_slider = $slider->del_slider($id);
    }
?>
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">
            <?php
                if(isset($del_slider)){
                    echo $del_slider;
                }
            ?>
            <table class="data display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slider Title</th>
                        <th>Slider Image</th>
                        <th>Slider Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $limit = 5;
                        $get_slider = $slider->show_slider_admin();
                        $total_slider = mysqli_num_rows($get_slider);
                        $current_page_slider = isset($_GET['page']) ? $_GET['page'] : 1;
                        $slider_start = ($current_page_slider -1) * $limit;
                        $total_page_slider = ceil($total_slider/$limit);
                        $get_pagination_slider = $slider->show_pagination_slider($slider_start,$limit);
                        if($get_pagination_slider){
                            while($result_slider = $get_pagination_slider->fetch_assoc()){
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align: center; vertical-align: middle"><?php echo $result_slider['id'] ?></td>
                        <td style="text-align: center; vertical-align: middle"><?php echo $result_slider['sliderName'] ?></td>
                        <td style="text-align: center; vertical-align: middle"><img src="uploads/<?php echo $result_slider['image'] ?>" height="120px" width="400px"/></td>
                        <td style="text-align: center; vertical-align: middle">
                            <?php
                                if($result_slider['type'] == 1){
                            ?>
                            <a href="?change_type=<?php echo $result_slider['id'] ?>&type=0" style="color: green">ON</a>
                            <?php
                                } else {
                            ?>
                            <a href="?change_type=<?php echo $result_slider['id'] ?>&type=1" style="color: red">OFF</a>
                            <?php
                                }
                            ?>
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            <a onclick="return confirm('Do you want to delete?');" style="color: red" href="?del_slider=<?php echo $result_slider['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                    if ($current_page_slider -1 > 0){
                        ?>
                        <li><a href="sliderlist.php?page=<?php echo $current_page_slider - 1; ?>">&laquo;</a></li>
                <?php
                    }
                ?>
                <?php
                    for($i = 1; $i <= $total_page_slider; $i++){
                ?>
                <li class="<?php echo (($current_page_slider == $i)?'active': '') ?>"><a href="sliderlist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                    }
                ?>
                <?php
                    if($current_page_slider + 1 <= $total_page_slider){
                ?>
                <li><a href="sliderlist.php?page=<?php echo $current_page_slider + 1; ?>">&raquo;</a></li>
                <?php
                    }
                ?>
            </div>
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
