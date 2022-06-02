<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../controller/brandController.php';
    include '../controller/categoryController.php';
    include '../controller/productController.php';
?>
<?php
    $prod = new productController();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        
        $insertProduct = $prod->insert_product($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
        <?php
            if(isset($insertProduct)){
                echo $insertProduct;
            }
        ?>
            <form action="productadd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>Select Category</option>
                                <?php
                                    $cat = new categoryController();
                                    $catlist = $cat->show_category();
                                    if($catlist){
                                        while($result = $catlist->fetch_assoc()){
                                ?>
                                <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>Select Brand</option>
                                <?php
                                    $brand = new brandController();
                                    $brandlist = $brand->show_brand();
                                    if($brandlist){
                                        while($result = $brandlist->fetch_assoc()){
                                ?>
                                <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>

                     <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="product_description" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Origin</label>
                        </td>
                        <td>
                            <input type="text" name="origin" placeholder="Origin..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Size</label>
                        </td>
                        <td>
                            <input type="text" name="size" placeholder="Size..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product weight</label>
                        </td>
                        <td>
                            <input type="text" name="productWeight" placeholder="Product weight..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Material</label>
                        </td>
                        <td>
                            <input type="text" name="material" placeholder="Material..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Radiators</label>
                        </td>
                        <td>
                            <input type="text" name="radiators" placeholder="Radiators..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>CPU</label>
                        </td>
                        <td>
                            <input type="text" name="cpu" placeholder="CPU..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>RAM</label>
                        </td>
                        <td>
                            <input type="text" name="ram" placeholder="RAM..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Type of RAM</label>
                        </td>
                        <td>
                            <input type="text" name="typeOfRam" placeholder="Type of RAM..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>RAM speed</label>
                        </td>
                        <td>
                            <input type="text" name="ramSpeed" placeholder="RAM speed..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Number of RAM slots</label>
                        </td>
                        <td>
                            <input type="text" name="numberOfRamSlot" placeholder="Number of RAM slots..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Maximum RAM support</label>
                        </td>
                        <td>
                            <input type="text" name="maximumRamSupport" placeholder="Maximum RAM support..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Screen size</label>
                        </td>
                        <td>
                            <input type="text" name="screenSize" placeholder="Screen size..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Resolution screen</label>
                        </td>
                        <td>
                            <input type="text" name="resolution" placeholder="Resolution screen..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Screen ratio</label>
                        </td>
                        <td>
                            <input type="text" name="screenRatio" placeholder="Screen ratio..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Onboard card</label>
                        </td>
                        <td>
                            <input type="text" name="onboardCard" placeholder="Onboard card..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Removable card</label>
                        </td>
                        <td>
                            <input type="text" name="removableCard" placeholder="Removable card..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Storage</label>
                        </td>
                        <td>
                            <input type="text" name="storage" placeholder="storage..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>The web of communication</label>
                        </td>
                        <td>
                            <input type="text" name="webCommunication" placeholder="The web of communication..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Wifi</label>
                        </td>
                        <td>
                            <input type="text" name="wifi" placeholder="Wifi..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Bluetooth</label>
                        </td>
                        <td>
                            <input type="text" name="bluetooth" placeholder="Bluetooth..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Camera</label>
                        </td>
                        <td>
                            <input type="text" name="camera" placeholder="Camera..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Keyboard type</label>
                        </td>
                        <td>
                            <input type="text" name="keyboardType" placeholder="Keyboard type..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Pin</label>
                        </td>
                        <td>
                            <input type="text" name="pin" placeholder="Pin..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>OS version</label>
                        </td>
                        <td>
                            <input type="text" name="osVersion" placeholder="OS version..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Water/Dirt resistance standard</label>
                        </td>
                        <td>
                            <input type="text" name="waterResistance" placeholder="Water/Dirt resistance standard..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Internal memory</label>
                        </td>
                        <td>
                            <input type="text" name="internalMemory" placeholder="Internal memory..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>SIM type</label>
                        </td>
                        <td>
                            <input type="text" name="simType" placeholder="SIM type..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Network support</label>
                        </td>
                        <td>
                            <input type="text" name="networkSupport" placeholder="Network support..." class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option value="1" selected>Featured</option>
                                <option value="0">Non-Featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php 
    include 'inc/footer.php';
?>