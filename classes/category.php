<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    class category{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database(); 
            $this->fm = new Format();   
        }

        public function insert_category($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            if(empty($catName)){
                $alert = "<span class='error'>Category must be not empty!!!</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_category (catName) VALUES ('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Success!!!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Failed!!!</span>";
                    return $alert;
                }
            }
        }

        public function show_category(){
            $query = "SELECT * FROM tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName,$status,$id){
            $catName = $this->fm->validation($catName);
            $status = $this->fm->validation($status);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $status = mysqli_real_escape_string($this->db->link, $status);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($catName)){
                $alert = "<span class='error'>Category must be not empty!!!</span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_category SET catName = '$catName', status = '$status' WHERE catId = '$id'";
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

//        public function delete_category($id){
//            $query = "DELETE FROM tbl_category WHERE catId = '$id'";
//            $result = $this->db->delete($query);
//            if($result){
//                $alert = "<span class='success'>Deleted successfully!!!</span>";
//                return $alert;
//            } else {
//                $alert = "<span class='error'>Failed!!!</span>";
//                return $alert;
//            }
//        }

        public function getcatbyId($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getAll_category(){
            $query = "SELECT * FROM tbl_category ORDER BY catId ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_cat($id){
            $query = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY productId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_name_by_cat($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>