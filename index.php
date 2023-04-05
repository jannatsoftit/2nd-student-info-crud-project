<?php

include("function.php");

$objcrudapp = new crudapp();

if(isset($_POST['add_button'])){
    $return_msg = $objcrudapp->add_info($_POST);

}

$students = $objcrudapp->display_data();


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
        <h1><a style="text-decoration:none;" href="index.php">Enter Student Information</a></h1>
            <?php if(isset($return_msg)){ echo $return_msg; } ?>
         <form class="form" action="" method="post" enctype="multipart/form-data">
            <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter Your Roll">
            <label for="image">Upload your image</label>
            <input class="form-control mb-2" type="file" name="std_img" placeholder="Enter Your Image">
            <input class="form-control bg-info" type="submit" value="Add Information" name="add_button">
         </form>

    </div>


      
    <div class="container my-4 p-4 shadow">
        <h1><a style="text-decoration:none;" href="index.php">All Student Information</a></h1>
        
      <table class="table ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            
        </thead>

        <tbody>

            <?php while($stu_info = mysqli_fetch_assoc($students)){ ?>
            <tr>
                <td><?php echo $stu_info['id']; ?></td>
                <td><?php echo $stu_info['std_name']; ?></td>
                <td><?php echo $stu_info['std_roll']; ?></td>
                <td><img style="height:100px;" src="upload/<?php echo $stu_info['std_img']; ?>"></td>
                <td>
                    <a class="btn btn-success" href="#">Edit</a>
                    <a class="btn btn-warning" href="#">Delete</a>
                </td>
            </tr>
            <?php }?>

        </tbody>

      </table>

    </div>
 
 



    <!-- Bootstrap JavaScript -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>