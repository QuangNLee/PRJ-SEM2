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
    if(isset($_GET['shippedId'])){
        $id = $_GET['shippedId'];
        $productId = $_GET['productId'];
        $quantity = $_GET['quantity'];
        $shipped = $order->shipped($id,$productId,$quantity);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <?php
                if(isset($shipped)){
                    echo $shipped;
                }
            ?>
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order time</th>
                    <th>Customer ID</th>
                    <th>Customer</th>
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
                    <td><?php echo $result['customerId'] ?></td>
                    <td><a href="customer.php?customerId=<?php echo $result['customerId'] ?>">View customer</a></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><?php echo $result['quantity'] ?></td>
                    <td><?php echo $result['total'] ?></td>
                    <td>
                        <?php
                            if($result['status'] == 0){
                        ?>
                        <a href="?shippedId=<?php echo $result['id'] ?>&productId=<?php echo $result['productId'] ?>
                            &quantity=<?php echo $result['quantity'] ?>">Pending</a>
                        <?php
                            } else if ($result['status'] == 1) {
                                echo 'Waiting';
                            } else {
                        ?>
                        <a style="color: green">Success</a>
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
