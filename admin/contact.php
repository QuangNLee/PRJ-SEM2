<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../controller/customerController.php';
?>
<?php
    $customer = new customerController();
    if(isset($_GET['change_status']) && isset($_GET['type'])){
        $id = $_GET['change_status'];
        $status = $_GET['type'];
        $update_status = $customer->update_status_contact($id,$status);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Require from customer</h2>
        <div class="block">
            <table class="data display">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">Name</th>
                        <th width="15%">Email</th>
                        <th width="10%">Phone</th>
                        <th width="50%">Question</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $limit = 10;
                        $get_contact = $customer->get_contact();
                        $total_contact = mysqli_num_rows($get_contact);
                        $current_page_contact = isset($_GET['page']) ? $_GET['page'] : 1;
                        $contact_start = ($current_page_contact -1) * $limit;
                        $total_page_contact = ceil($total_contact/$limit);
                        $get_pagination_contact = $customer->get_pagination_contact($contact_start,$limit);
                        if($get_pagination_contact){
                            while($result = $get_pagination_contact->fetch_assoc()){
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align: center"><?php echo $result['id']; ?></td>
                        <td style="text-align: center"><?php echo $result['name'] ?></td>
                        <td style="text-align: center"><?php echo $result['email'] ?></td>
                        <td style="text-align: center"><?php echo $result['phone'] ?></td>
                        <td><?php echo $result['subject'] ?></td>
                        <td style="text-align: center">
                            <?php
                                if($result['status'] == 1){
                            ?>
                            <a href="?change_status=<?php echo $result['id'] ?>&type=0" style="color: green">Processed</a>
                            <?php
                                } else {
                            ?>
                            <a href="?change_status=<?php echo $result['id'] ?>&type=1" style="color: red">Waiting</a>
                            <?php
                                }
                            ?>
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
                if ($current_page_contact -1 > 0){
                    ?>
                    <li><a href="contact.php?page=<?php echo $current_page_contact - 1; ?>">&laquo;</a></li>
                    <?php
                }
                ?>
                <?php
                for($i = 1; $i <= $total_page_contact; $i++){
                    ?>
                    <li class="<?php echo (($current_page_contact == $i)?'active': '') ?>"><a href="contact.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <?php
                if($current_page_contact + 1 <= $total_page_contact){
                    ?>
                    <li><a href="contact.php?page=<?php echo $current_page_contact + 1; ?>">&raquo;</a></li>
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
<?php
    include 'inc/footer.php';
?>