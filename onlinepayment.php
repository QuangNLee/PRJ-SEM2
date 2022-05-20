<?php
    include 'inc/header.php';
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3> Online Payment</h3>
                </div>
                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Choose your method</h3>
                    <form action="onlinePaymentBill.php?gate=vnpay" method="POST">
                        <button class="btn btn-success" name="redirect" id="redirect">VNPAY</button>
                    </form>
                    <br><br>
                    <a style="background: grey" href="payment.php"><< BACK</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'inc/footer.php';
?>
