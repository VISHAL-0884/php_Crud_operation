<?php

      include "db.php";
      $sql = "select * from student";
      $read = $cn->prepare($sql);
      if ($read->execute()) {
            $rows = $read->fetchall();
      }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Table</title>
  </head>
  <body>


       <!-- Table start.. -->    
       <div class="container mt-5">
            <div class="row">
                  <div class="col-md-10 m-auto border">
                         <table class="table table-striped table-dark table table-bordered" style="padding:40px">
  <thead>
    <tr>
      <th scope="col">S_Id</th>
      <th scope="col">F_Name</th>
      <th scope="col">L_Name</th>
      <th scope="col">Adress</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Education</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
      <?php
      
            foreach ($rows as $row) {
      ?>
       <tbody>
             <tr>
                  <th scope="row"><?php  echo $row['id'] ?></th>     
                  <td><?php  echo $row['fname'];?> </td>
                  <td><?php  echo $row['lname'];?> </td>
                  <td><?php  echo $row['address'];?> </td>
                  <td><?php  echo $row['gender'];?> </td>
                  <td><?php  echo $row['email'];?> </td>
                  <td><?php  echo $row['education'];?> </td>
                  <td><?php  echo $row['city'];?> </td>
                  <td><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn-success" style="padding:8px">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn-success" style="padding:8px">Delete</a></td>
            </tr>
      </tbody>

  <?php
      }
  ?>
</table>
                  </div>
            </div>
       </div>

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>