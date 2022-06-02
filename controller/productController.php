<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once($filepath . '/../helpers/format.php');
?>
<?php
    class productController{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database(); 
            $this->fm = new Format();   
        }

        public function insert_product($data,$files){
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_description = mysqli_real_escape_string($this->db->link, $data['product_description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $origin = mysqli_real_escape_string($this->db->link, $data['origin']);
            $size = mysqli_real_escape_string($this->db->link, $data['size']);
            $productWeight = mysqli_real_escape_string($this->db->link, $data['productWeight']);
            $material = mysqli_real_escape_string($this->db->link, $data['material']);
            $radiators = mysqli_real_escape_string($this->db->link, $data['radiators']);
            $cpu = mysqli_real_escape_string($this->db->link, $data['cpu']);
            $ram = mysqli_real_escape_string($this->db->link, $data['ram']);
            $typeOfRam = mysqli_real_escape_string($this->db->link, $data['typeOfRam']);
            $ramSpeed = mysqli_real_escape_string($this->db->link, $data['ramSpeed']);
            $numberOfRamSlot = mysqli_real_escape_string($this->db->link, $data['numberOfRamSlot']);
            $maximumRamSupport = mysqli_real_escape_string($this->db->link, $data['maximumRamSupport']);
            $screenSize = mysqli_real_escape_string($this->db->link, $data['screenSize']);
            $resolution = mysqli_real_escape_string($this->db->link, $data['resolution']);
            $screenRatio = mysqli_real_escape_string($this->db->link, $data['screenRatio']);
            $onboardCard = mysqli_real_escape_string($this->db->link, $data['onboardCard']);
            $removableCard = mysqli_real_escape_string($this->db->link, $data['removableCard']);
            $storage = mysqli_real_escape_string($this->db->link, $data['storage']);
            $webCommunication = mysqli_real_escape_string($this->db->link, $data['webCommunication']);
            $wifi = mysqli_real_escape_string($this->db->link, $data['wifi']);
            $bluetooth = mysqli_real_escape_string($this->db->link, $data['bluetooth']);
            $camera = mysqli_real_escape_string($this->db->link, $data['camera']);
            $keyboardType = mysqli_real_escape_string($this->db->link, $data['keyboardType']);
            $pin = mysqli_real_escape_string($this->db->link, $data['pin']);
            $osVersion = mysqli_real_escape_string($this->db->link, $data['osVersion']);
            $waterResistance = mysqli_real_escape_string($this->db->link, $data['waterResistance']);
            $internalMemory = mysqli_real_escape_string($this->db->link, $data['internalMemory']);
            $simType = mysqli_real_escape_string($this->db->link, $data['simType']);
            $networkSupport = mysqli_real_escape_string($this->db->link, $data['networkSupport']);
            //Check image and put image into folder upload
            $permitted = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if($productName == "" || $category == "" || $brand == "" || $product_description == "" || $price == "" || $type == "" || $file_name == ""){
                $alert = "<span class='error'>Fields must be not empty!!!</span>";
                return $alert;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product (productName, catId, brandId, product_description, type, price, image) 
                    VALUES ('$productName', '$category', '$brand', '$product_description', '$type', '$price', '$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $get_ID_pro = "SELECT productId FROM tbl_product ORDER BY productId DESC LIMIT 1";
                    $result_get_ID_pro = $this->db->select($get_ID_pro)->fetch_assoc();
                    $productId = $result_get_ID_pro['productId'];
                    $get_origin_id = "SELECT id FROM tbl_specification WHERE name LIKE '%origin%'";
                    $result_origin_id = $this->db->select($get_origin_id)->fetch_assoc();
                    $originId = $result_origin_id['id'];
                    $get_size_id = "SELECT id FROM tbl_specification WHERE name LIKE '%size%'";
                    $result_size_id = $this->db->select($get_size_id)->fetch_assoc();
                    $sizeId = $result_size_id['id'];
                    $get_productWeight_id = "SELECT id FROM tbl_specification WHERE name LIKE '%product weigh%'";
                    $result_productWeight_id = $this->db->select($get_productWeight_id)->fetch_assoc();
                    $productWeightId = $result_productWeight_id['id'];
                    $get_material_id = "SELECT id FROM tbl_specification WHERE name LIKE '%material%'";
                    $result_material_id = $this->db->select($get_material_id)->fetch_assoc();
                    $materialId = $result_material_id['id'];
                    $get_radiators_id = "SELECT id FROM tbl_specification WHERE name LIKE '%radiator%'";
                    $result_radiators_id = $this->db->select($get_radiators_id)->fetch_assoc();
                    $radiatorsId = $result_radiators_id['id'];
                    $get_cpu_id = "SELECT id FROM tbl_specification WHERE name LIKE '%cpu%'";
                    $result_cpu_id = $this->db->select($get_cpu_id)->fetch_assoc();
                    $cpuId = $result_cpu_id['id'];
                    $get_ram_id = "SELECT id FROM tbl_specification WHERE name LIKE '%ram%'";
                    $result_ram_id = $this->db->select($get_ram_id)->fetch_assoc();
                    $ramId = $result_ram_id['id'];
                    $get_typeOfRam_id = "SELECT id FROM tbl_specification WHERE name LIKE '%type of ram%'";
                    $result_typeOfRam_id = $this->db->select($get_typeOfRam_id)->fetch_assoc();
                    $typeOfRamId = $result_typeOfRam_id['id'];
                    $get_ramSpeed_id = "SELECT id FROM tbl_specification WHERE name LIKE '%ram speed%'";
                    $result_ramSpeed_id = $this->db->select($get_ramSpeed_id)->fetch_assoc();
                    $ramSpeedId = $result_ramSpeed_id['id'];
                    $get_numberOfRamSlot_id = "SELECT id FROM tbl_specification WHERE name LIKE '%number of ram slot%'";
                    $result_numberOfRamSlot_id = $this->db->select($get_numberOfRamSlot_id)->fetch_assoc();
                    $numberOfRamSlotId = $result_numberOfRamSlot_id['id'];
                    $get_maximumRamSupport_id = "SELECT id FROM tbl_specification WHERE name LIKE '%maximum ram support%'";
                    $result_maximumRamSupport_id = $this->db->select($get_maximumRamSupport_id)->fetch_assoc();
                    $maximumRamSupportId = $result_maximumRamSupport_id['id'];
                    $get_screenSize_id = "SELECT id FROM tbl_specification WHERE name LIKE '%screen size%'";
                    $result_screenSize_id = $this->db->select($get_screenSize_id)->fetch_assoc();
                    $screenSizeId = $result_screenSize_id['id'];
                    $get_resolution_id = "SELECT id FROM tbl_specification WHERE name LIKE '%resolution%'";
                    $result_resolution_id = $this->db->select($get_resolution_id)->fetch_assoc();
                    $resolutionId = $result_resolution_id['id'];
                    $get_screenRatio_id = "SELECT id FROM tbl_specification WHERE name LIKE '%screen ratio%'";
                    $result_screenRatio_id = $this->db->select($get_screenRatio_id)->fetch_assoc();
                    $screenRatioId = $result_screenRatio_id['id'];
                    $get_onboardCard_id = "SELECT id FROM tbl_specification WHERE name LIKE '%onboard card%'";
                    $result_onboardCard_id = $this->db->select($get_onboardCard_id)->fetch_assoc();
                    $onboardCardId = $result_onboardCard_id['id'];
                    $get_removableCard_id = "SELECT id FROM tbl_specification WHERE name LIKE '%removable card%'";
                    $result_removableCard_id = $this->db->select($get_removableCard_id)->fetch_assoc();
                    $removableCardId = $result_removableCard_id['id'];
                    $get_storage_id = "SELECT id FROM tbl_specification WHERE name LIKE '%storage%'";
                    $result_storage_id = $this->db->select($get_storage_id)->fetch_assoc();
                    $storageId = $result_storage_id['id'];
                    $get_webCommunication_id = "SELECT id FROM tbl_specification WHERE name LIKE '%the web of communication%'";
                    $result_webCommunication_id = $this->db->select($get_webCommunication_id)->fetch_assoc();
                    $webCommunicationId = $result_webCommunication_id['id'];
                    $get_wifi_id = "SELECT id FROM tbl_specification WHERE name LIKE '%wifi%'";
                    $result_wifi_id = $this->db->select($get_wifi_id)->fetch_assoc();
                    $wifiId = $result_wifi_id['id'];
                    $get_bluetooth_id = "SELECT id FROM tbl_specification WHERE name LIKE '%bluetooth%'";
                    $result_bluetooth_id = $this->db->select($get_bluetooth_id)->fetch_assoc();
                    $bluetoothId = $result_bluetooth_id['id'];
                    $get_camera_id = "SELECT id FROM tbl_specification WHERE name LIKE '%camera%'";
                    $result_camera_id = $this->db->select($get_camera_id)->fetch_assoc();
                    $cameraId = $result_camera_id['id'];
                    $get_keyboardType_id = "SELECT id FROM tbl_specification WHERE name LIKE '%keyboard type%'";
                    $result_keyboardType_id = $this->db->select($get_keyboardType_id)->fetch_assoc();
                    $keyboardTypeId = $result_keyboardType_id['id'];
                    $get_pin_id = "SELECT id FROM tbl_specification WHERE name LIKE '%pin%'";
                    $result_pin_id = $this->db->select($get_pin_id)->fetch_assoc();
                    $pinId = $result_pin_id['id'];
                    $get_osVersion_id = "SELECT id FROM tbl_specification WHERE name LIKE '%os version%'";
                    $result_osVersion_id = $this->db->select($get_osVersion_id)->fetch_assoc();
                    $osVersionId = $result_osVersion_id['id'];
                    $get_waterResistance_id = "SELECT id FROM tbl_specification WHERE name LIKE '%Water/Dirt resistance%'";
                    $result_waterResistance_id = $this->db->select($get_waterResistance_id)->fetch_assoc();
                    $waterResistanceId = $result_waterResistance_id['id'];
                    $get_internalMemory_id = "SELECT id FROM tbl_specification WHERE name LIKE '%internal memory%'";
                    $result_internalMemory_id = $this->db->select($get_internalMemory_id)->fetch_assoc();
                    $internalMemoryId = $result_internalMemory_id['id'];
                    $get_simType_id = "SELECT id FROM tbl_specification WHERE name LIKE '%sim type%'";
                    $result_simType_id = $this->db->select($get_simType_id)->fetch_assoc();
                    $simTypeId = $result_simType_id['id'];
                    $get_networkSupport_id = "SELECT id FROM tbl_specification WHERE name LIKE '%network support%'";
                    $result_networkSupport_id = $this->db->select($get_networkSupport_id)->fetch_assoc();
                    $networkSupportId = $result_networkSupport_id['id'];
                    $query_pro_spec = "insert into tbl_pro_spec values
                        ('$productId','$originId','$origin'),
                        ('$productId','$sizeId','$size'),
                        ('$productId','$productWeightId','$productWeight'),
                        ('$productId','$materialId','$material'),
                        ('$productId','$radiatorsId','$radiators'),
                        ('$productId','$cpuId','$cpu'),
                        ('$productId','$ramId','$ram'),
                        ('$productId','$typeOfRamId','$typeOfRam'),
                        ('$productId','$ramSpeedId','$ramSpeed'),
                        ('$productId','$numberOfRamSlotId','$numberOfRamSlot'),
                        ('$productId','$maximumRamSupportId','$maximumRamSupport'),
                        ('$productId','$screenSizeId','$screenSize'),
                        ('$productId','$resolutionId','$resolution'),
                        ('$productId','$screenRatioId','$screenRatio'),
                        ('$productId','$onboardCardId','$onboardCard'),
                        ('$productId','$removableCardId','$removableCard'),
                        ('$productId','$storageId','$storage'),
                        ('$productId','$webCommunicationId','$webCommunication'),
                        ('$productId','$wifiId','$wifi'),
                        ('$productId','$bluetoothId','$bluetooth'),
                        ('$productId','$cameraId','$camera'),
                        ('$productId','$keyboardTypeId','$keyboardType'),
                        ('$productId','$pinId','$pin'),
                        ('$productId','$osVersionId','$osVersion'),
                        ('$productId','$waterResistanceId','$waterResistance'),
                        ('$productId','$internalMemoryId','$internalMemory'),
                        ('$productId','$simTypeId','$simType'),
                        ('$productId','$networkSupportId','$networkSupport');";
                    $result_pro_spec = $this->db->insert($query_pro_spec);
                    if($result_pro_spec){
                        $alert = "<span class='success'>Success!!!</span>";
                        return $alert;
                    } else {
                        $alert = "<span class='error'>Failed!!!</span>";
                        return $alert;
                    }
                } else {
                    $alert = "<span class='error'>Failed!!!</span>";
                    return $alert;
                }
            }
        }

        public function show_product(){
            $query = "SELECT p.*, c.catName, b.brandName
                FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                WHERE p.catId = c.catId and p.brandId = b.brandId
                ORDER BY p.productName ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_pagination_product($product_start,$limit){
            $product_start = mysqli_real_escape_string($this->db->link, $product_start);
            $limit = mysqli_real_escape_string($this->db->link, $limit);
            $query = "SELECT p.*, c.catName, b.brandName
                FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                WHERE p.catId = c.catId and p.brandId = b.brandId
                ORDER BY p.productId ASC LIMIT {$product_start},{$limit}";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id){
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_description = mysqli_real_escape_string($this->db->link, $data['product_description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $status = mysqli_real_escape_string($this->db->link, $data['status']);
            //Check image and put image into folder upload
            $permitted = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if($productName == "" || $category == "" || $brand == "" || $product_description == "" || $price == "" || $type == "" || $status == ""){
                $alert = "<span class='error'>Fields must be not empty!!!</span>";
                return $alert;
            } else {
                if(!empty($file_name)){
                    if($file_size > 20480){
                        $alert = "<span class='error'>Image size should be less than 2MB!</span>";
                        return $alert;
                    } else if (in_array($file_ext, $permitted) === false){
                        $alert = "<span class='error'> You can upload only :-".implode(', ', $permitted)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET 
                        productName = '$productName',
                        catId = '$category',
                        brandId = '$brand',
                        product_description = '$product_description',
                        type = '$type',
                        price = '$price',
                        image = '$unique_image',
                        status = '$status'
                        WHERE productId = '$id'";
                } else {
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    catId = '$category',
                    brandId = '$brand',
                    product_description = '$product_description',
                    type = '$type',
                    price = '$price',
                    status = '$status'
                    WHERE productId = '$id'";
                }
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Updated successfully!!!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Failed!!!</span>";
                    return $alert;
                }
            }
        }

//        public function delete_product($id){
//            $query = "DELETE FROM tbl_product WHERE productId = '$id'";
//            $result = $this->db->delete($query);
//            if($result){
//                $alert = "<span class='success'>Deleted successfully!!!</span>";
//                return $alert;
//            } else {
//                $alert = "<span class='error'>Failed!!!</span>";
//                return $alert;
//            }
//        }

        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        //FRONTEND
        public function getproduct_featured(){
            $query = "SELECT * FROM tbl_product WHERE type = '1' AND status = '1' ORDER BY productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product WHERE status = '1' ORDER BY productId desc LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_all_product_new(){
            $query = "SELECT * FROM tbl_product WHERE status = '1'";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = "SELECT p.*, c.catName, b.brandName
                FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                where p.catId = c.catId and p.brandId = b.brandId
                and p.productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastestIP(){
            $query = "SELECT * FROM tbl_product WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE 'apple') AND status = '1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastestSamsung(){
            $query = "SELECT * FROM tbl_product WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE 'samsung') AND status = '1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestMSI(){
            $query = "SELECT * FROM tbl_product WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE 'msi') AND status = '1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function getLastestDELL(){
            $query = "SELECT * FROM tbl_product WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE 'dell') AND status = '1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function search_product($keyword){
            $keyword = $this->fm->validation($keyword);
            $query = "SELECT * FROM tbl_product WHERE productId IN (SELECT productId FROM tbl_product
                WHERE productName LIKE '%$keyword%' AND status = 1) OR productId IN (SELECT productId FROM tbl_product
                WHERE catId = (SELECT catId FROM tbl_category WHERE catName LIKE '%$keyword%' AND status = 1))
                OR productId IN (SELECT productId FROM tbl_product
                WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE '%$keyword%' AND status = 1))
                ORDER BY productName ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function search_product_pagination($keyword,$product_start,$limit){
            $keyword = $this->fm->validation($keyword);
            $product_start = mysqli_real_escape_string($this->db->link, $product_start);
            $limit = mysqli_real_escape_string($this->db->link, $limit);
            $query = "SELECT * FROM tbl_product WHERE productId IN (SELECT productId FROM tbl_product
                WHERE productName LIKE '%$keyword%' AND status = 1) OR productId IN (SELECT productId FROM tbl_product
                WHERE catId = (SELECT catId FROM tbl_category WHERE catName LIKE '%$keyword%' AND status = 1))
                OR productId IN (SELECT productId FROM tbl_product
                WHERE brandId = (SELECT brandId FROM tbl_brand WHERE brandName LIKE '%$keyword%' AND status = 1))
                ORDER BY type DESC, productName ASC LIMIT {$product_start},{$limit}";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_brand($brandId){
            $catId = mysqli_real_escape_string($this->db->link, $brandId);
            $query = "SELECT * FROM tbl_product WHERE brandId = '$brandId' AND status = 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_pagination_product_by_brand($brandId,$product_start,$limit){
            $brandId = mysqli_real_escape_string($this->db->link, $brandId);
            $product_start = mysqli_real_escape_string($this->db->link, $product_start);
            $limit = mysqli_real_escape_string($this->db->link, $limit);
            $query = "SELECT * FROM tbl_product where brandId = '$brandId' AND status = 1 ORDER BY type DESC, productName ASC LIMIT {$product_start},{$limit}";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_cat($id){
            $query = "SELECT * FROM tbl_product WHERE catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_pagination_product_by_cat($catId,$product_start,$limit){
            $catId = mysqli_real_escape_string($this->db->link, $catId);
            $product_start = mysqli_real_escape_string($this->db->link, $product_start);
            $limit = mysqli_real_escape_string($this->db->link, $limit);
            $query = "SELECT * FROM tbl_product where catId = '$catId' AND status = 1 ORDER BY type DESC, productName ASC LIMIT {$product_start},{$limit}";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_spec($productId){
            $query = "SELECT s.name, ps.value FROM tbl_specification s, tbl_pro_spec ps WHERE s.id = ps.specId AND ps.productId = '$productId' AND ps.value NOT LIKE ''";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>