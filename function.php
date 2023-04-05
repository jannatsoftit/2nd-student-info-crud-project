<?php

class crudapp{

     private $conn;

     public function __construct(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "crudpro";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("Database Connection Error!!");
        }

     }

     //CREATE data & send DATAbase studentinfo table ee

        public function add_info($data){
            $std_name = $data['std_name'];
            $std_roll = $data['std_roll'];
            $std_img = $_FILES['std_img']['name'];
            $tmp_name = $_FILES['std_img']['tmp_name'];

            $query = "INSERT INTO studentinfo(std_name,std_roll,std_img) 
            VALUE('$std_name',$std_roll,'$std_img') ";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, "upload/".$std_img);
                return "Information Added Successfully";
            }

        }


        //studentinfo theke data niye index.php te READ kora...(READ DATA)

        public function display_data(){

            $query = "SELECT * FROM studentinfo";

            if(mysqli_query($this->conn, $query)){

                $return_data = mysqli_query($this->conn, $query);
                return $return_data;
            }

        }



}






























?>

