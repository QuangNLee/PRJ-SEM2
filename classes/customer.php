<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    class customer{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $district = mysqli_real_escape_string($this->db->link, $data['district']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $district == "" || $phone == "" || $password == ""){
                $alert = "<span class='error'>Fields must be not empty!!!</span>";
                return $alert;
            } else {
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if ($result_check){
                    $alert = "<span class='error'>Email already exists!!!</span>";
                    return $alert;
                } else {
                    $query = "INSERT INTO tbl_customer (name, address, district, city, zipcode, phone, email, password) 
                        VALUES ('$name', '$address', '$district', '$city', '$zipcode', '$phone', '$email', '$password')";
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
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($email == "" || $password == ""){
                $alert = "<span class='error'>Email or password must be not empty!!!</span>";
                return $alert;
            } else {
                $check_em_lg = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
                $result_check_lg = $this->db->select($check_em_lg);
                if ($result_check_lg != false){
                    $value = $result_check_lg->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id', $value['id']);
                    Session::set('customer_name', $value['name']);
                    header('Location:order.php');
                } else {
                    $alert = "<span class='error'>Email or password does not correct!!!</span>";
                    return $alert;
                }
            }
        }
    }
?>