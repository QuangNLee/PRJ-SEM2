<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/order.php');
    include_once ($filepath.'/../helper/format.php');
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
                    <th>Address</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $order = new order();
                    $fm = new Format();
                    $get_inbox_order = $order->get_inbox_order();
                    if($get_inbox_order){
                        $i = 0;
                        while ($result = $get_inbox_order->fetch_assoc()){
                            $i++;
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i ?></td>
                    <td><?php echo $fm->formatDate($result['createdAt']) ?></td>
                    <td><a href="customer.php?customerId=<?php echo $result['customerId'] ?>">View address</a></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><?php echo $result['quantity'] ?></td>
                    <td><?php echo $result['total'] ?></td>
                    <td>
                        <?php
                            if($result['status'] == 0){
                        ?>
                        <a href="?shippedId=<?php echo $result['id'] ?>&productname=<?php echo $result['productName'] ?>&time=<?php echo $result['createdAt'] ?>">Pending</a>
                        <?php
                            } else {
                        ?>
                        <a href="?shippedId=<? echo $result['id'] ?>&productname=<?php echo $result['productName'] ?>
                            &time=<?php echo $result['createdAt'] ?>">Pending</a>
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
