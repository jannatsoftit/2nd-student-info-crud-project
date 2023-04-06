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

        public function display_data_by_id($id){

            $query = "SELECT * FROM studentinfo WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                $return_data = mysqli_query($this->conn, $query);
                $studentdata = mysqli_fetch_assoc($return_data);
                return $studentdata;
            }

        }


        public function update_data($data){
            $std_name = $data['u_std_name'];
            $std_roll = $data['u_std_roll'];
            $idno = $data['u_std_id'];
            $std_img = $_FILES['u_std_img']['name'];
            $tmp_name = $_FILES['u_std_img']['tmp_name'];

            $query = "UPDATE studentinfo SET std_name='$std_name',std_roll=$std_roll, std_img='$std_img' WHERE id=$idno";


            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, "upload/".$std_img);
                return "Information Updated Successfully";
            }
        }


        public function delete_data($id){

            $catch_img = "SELECT * FROM studentinfo WHERE id=$id";
            $stu_info = mysqli_query($this->conn, $catch_img);
            $delete_stu_data = mysqli_fetch_assoc($stu_info);
            $delete_img = $delete_stu_data['std_img'];

            $query = "DELETE FROM studentinfo WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                unlink('upload/'.$delete_img);
                return "Information Deleted Successfully";
            }

        }



}




?>


