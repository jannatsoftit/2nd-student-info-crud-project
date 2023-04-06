<?php

include("function.php");

$objcrudapp = new crudapp();

$students = $objcrudapp->display_data();

if(isset($_GET['status'])){
    if($_GET['status'] = "edit"){
        $id = $_GET['id'];

       $return_stu_data = $objcrudapp->display_data_by_id($id);
    }
}

if(isset($_POST['edit_button'])){

   $update_msg = $objcrudapp->update_data($_POST);
}


?> 



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Site Title -->
    <title>2nd student crud projects</title>
  </head>
  <body>
    
  
     <div class="container my-4 p-4 shadow">

        <h1><a style="text-decoration:none;" href="index.php">Edit Student Information</a></h1>
            <?php if(isset($update_msg)){ echo $update_msg; } ?>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <input class="form-control mb-2" type="text" name="u_std_name" value="<?php echo $return_stu_data['std_name']; ?>">
            <input class="form-control mb-2" type="number" name="u_std_roll" value="<?php echo $return_stu_data['std_roll']; ?>">
            <label for="image">Upload your image</label>
            <input class="form-control mb-2" type="file" name="u_std_img" value="<?php echo $return_stu_data['std_img']; ?>">
            <input type="hidden" name="u_std_id" value="<?php echo $return_stu_data['id']; ?>">
            <input class="form-control bg-info" type="submit" value="Update Information" name="edit_button">
        </form>

    </div>


    <!-- Bootstrap JavaScript -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
