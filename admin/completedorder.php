<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/order.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    $order = new order();
    $fm = new Format();
    $get_successful_order = $order->get_completed_order();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Order time</th>
                    <th>Type</th>
                    <th>Customer ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if($get_successful_order){
                        $i = 0;
                        while ($result = $get_successful_order->fetch_assoc()){
                            $i++;
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i ?></td>
                    <td><?php echo $fm->formatDate($result['createdAt']) ?></td>
                    <td><?php echo $result['orderType'] ?></td>
                    <td><?php echo $result['customerId'] ?></td>
                    <td><a href="customer.php?customerId=<?php echo $result['customerId'] ?>">View customer</a></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><?php echo $result['quantity'] ?></td>
                    <td><?php echo $result['total'] ?></td>
                    <?php
                        if($result['status'] == 2){
                    ?>
                            <td><a style="color: green">Success</a></td>
                    <?php
                        } else {
                    ?>
                            <td><a style="color: #8B0000">Canceled</a></td>
                    <?php
                        }
                    ?>
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
