<?php
    include 'inc/header.php';
?>
<?php
    if (isset($_GET['cartId'])){
        $cartid = $_GET['cartId'];
        $delcart = $cart->del_product_cart($cartid);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $cart->update_quantity_cart($quantity,$cartId);
        if($quantity<=0){
            $delcart = $cart->del_product_cart($cartId);
        }
    }
?>
    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div>
                    <?php
                        if(isset($_GET['gate']) == 'vnpay'){

                        }
                    ?>
                    <h2 style="border-bottom: 1px solid #ddd; font-size: 30px; margin-bottom: 20px;">VNPAY</h2>
                    <?php
                        if (isset($update_quantity_cart)){
                            echo $update_quantity_cart;
                        }
                    ?>
                    <?php
                        if (isset($delcart)){
                            echo $delcart;
                        }
                    ?>
                    <table class="tblone">
                        <tr>
                            <th width="30%">Product Name</th>
                            <th width="20%">Image</th>
                            <th width="20%">Price</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Total Price</th>
                        </tr>
                        <?php
                            $get_product_cart = $cart->get_product_cart();
                            if($get_product_cart){
                                $subtotal = 0;
                                $qty = 0;
                                while ($result = $get_product_cart->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $result['productName'] ?></td>
                            <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
                            <td><?php echo $fm->format_currency($result['price']) ?> VND</td>
                            <td><?php echo $result['quantity'] ?></td>
                            <td><?php
                                $total = $result['price'] * $result['quantity'];
                                echo $fm->format_currency($total);
                                ?>
                                VND</td>
                        </tr>
                        <?php
                                $subtotal += $total;
                                $qty = $qty + $result['quantity'];
                                }
                            }
                        ?>
                    </table>
                    <?php
                        $check_cart = $cart->check_cart();
                        if($check_cart){
                    ?>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Sub Total : </th>
                            <td>
                                <?php
                                    echo $fm->format_currency($subtotal);
                                    Session::set('sum',$subtotal);
                                    Session::set('qty',$qty);
                                ?>
                                VND
                            </td>
                        </tr>
                        <tr>
                            <th>VAT : </th>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>
                                <?php
                                    $vat = $subtotal * 0.05;
                                    $gtotal = $subtotal + $vat;
                                    echo $fm->format_currency($gtotal);
                                ?>
                                VND
                            </td>
                        </tr>
                    </table>
                    <?php
                        } else {
                            echo 'Your cartController is empty!';
                        }
                    ?>
                </div><br>
            </div>
            <div class="clear"></div>
            <div class="shopping" style="text-align: center">
                <?php
                $check_cart = $cart->check_cart();
                if(Session::get('customer_id') == true && $check_cart){
                    ?>
                    <?php
                    if(isset($_GET['gate']) == 'vnpay'){
                        ?>
                        <form action="paymentgatevnpay.php" method="POST">
                            <input type="hidden" name="total_payment" value="<?php echo $gtotal; ?>">
                            <button class="btn btn-success btn-payment" name="redirect" id="redirect">Cart Payment</button>
                        </form>
                        <?php
                    }
                    ?>
                    <?php
                } else {
                    ?>
                    <a class="btn btn-success btn-payment" href=""><< Back to cart</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>