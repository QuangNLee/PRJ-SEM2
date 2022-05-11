<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    class cart{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database(); 
            $this->fm = new Format();   
        }

        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sid = session_id();
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $productName = $result['productName'];
            $image = $result['image'];
            $price = $result['price'];
//            $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sid = '$sid'";
//            if($check_cart){
//                $msg = "<span class='error'>Product already exists in cart!!!</span>";
//                return $msg;
//            } else {
                $query_insert = "INSERT INTO tbl_cart (productId, sid, productName, price, quantity, image) 
                    VALUES ('$id', '$sid', '$productName', '$price', '$quantity', '$image')";
                $result_insert = $this->db->insert($query_insert);
                if($result_insert){
                    header('Location:cart.php');
                } else {
                    header('Location:404.php');
                }
//            }
        }

        public function get_product_cart(){
            $sid = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($quantity,$cartId){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link,$cartId);
            $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            } else {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }

        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            } else{
                $msg = "<span class='error'>Failed!!!</span>";
                return $msg;
            }
        }

        public function check_cart(){
            $sid = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_all_data_cart(){
            $sid = session_id();
            $query = "DELETE FROM tbl_cart WHERE sid = '$sid'";
            $result = $this->db->delete($query);
            return $result;
        }
    }
?>