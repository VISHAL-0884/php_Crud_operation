<?php
      $msg = "";
      $cn = "";
      $fname="";
      $lname="";
      $address="";
      $gender="";
      $email="";
      $city="";
      $row="";
      $education_arry="";
      $education_str="";
      $cmd = "";
      $msg = "";
      $row = "";

      include "db.php";
      if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $sql = "select * from student where id = :id";

            $edit = $cn->prepare($sql);

            $edit->bindParam(":id",$id);

            if ($edit->execute()) {

                  $row = $edit->fetch();
            }
            $e = explode(",",$row['education']);

      }

      //  Data update to update query use... 

      if (isset($_POST['cmd'])) {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $address = $_POST['address'];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $education_arry = $_POST['ch'];
            $education_str = implode(",",$education_arry);
            $city = $_POST["city"];

            $sql = "update student set fname=:fname,lname=:lname,address=:address,gender=:gender,email=:email,education=:education,city=:city where id=:id";
            $upd = $cn->prepare($sql);

            $upd->bindParam(":id",$id);
            $upd->bindParam(":fname",$fname);
            $upd->bindParam(":lname",$lname);
            $upd->bindParam(":address",$address);
            $upd->bindParam(":gender",$gender);
            $upd->bindParam(":email",$email);
            $upd->bindParam(":education",$education_str);
            $upd->bindParam(":city",$city);

            if ($upd->execute()) {

                  header("Location:read.php");
                  print_r($upd);
            }
            else {
                  echo "<h4>Don't Updated...</h4>";
            }
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
    <title>Student Registration for edit</title>
  </head>
  <body>
            <!-- <div class="container">
                  <div class="row"> -->
                  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-500">
    <div class="row justify-content-left align-items-center h-100" >
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="text-transform:uppercase;">Student Registration for edit</h3>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?php echo $msg;?></h3>

            <form method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">

                <div class="form-outline">
                    <input type="hidden"  name="id" value="<?php  echo $row['id']; ?>">
                  </div>

                  <div class="form-outline">
                    <input type="text" placeholder="first name" id="firstname" name="fname" value="<?php echo $row['fname'] ?>" class="form-control form-control-lg" value="<?php  echo $fname; ?>" />
                    <label class="form-label" for="firstname"><h6 class="mb-2 pb-1">First Name: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" placeholder="last name" id="lastName" name="lname" value="<?php echo $row['lname']; ?>" class="form-control form-control-lg" value="<?php  echo $lname; ?>"/>
                    <label class="form-label" for="lastName"><h6 class="mb-2 pb-1">Last Name: </h6></label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <textarea id="address" id="" cols="30" rows="3" name="address" class="form-control form-control-lg" ><?php  echo $row['address']; ?> </textarea>
                    <label class="form-check-label" for="address"><h6 class="mb-2 pb-1">Address: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" <?php if($row['gender']=="male") echo "checked" ?> id="femaleGender"/>
                    <label class="form-check-label" for="femaleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" <?php if($row['gender']=="female") echo "checked" ?> id="maleGender"/>
                    <label class="form-check-label" for="maleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="other"  <?php  if($row['gender']=="other") echo "checked" ?>id="otherGender" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" value="<?php  echo $row['email']; ?>"/>
                    <label class="form-label" for="emailAddress"><h6 class="mb-2 pb-1">Email: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                <h6 class="mb-2 pb-1">Education: </h6>

            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="ch[]" id="femaleGender" value="MCA"  <?php if(in_array("MCA",$e)) echo 'checked';  ?>  />
                   <label class="form-check-label" for="femaleGender">MCA</label>
            </div>

            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="ch[]" id="maleGender"value="BSC"  <?php if(in_array("BSC",$e)) echo 'checked';  ?>/>
                  <label class="form-check-label" for="maleGender">BSC</label>
             </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender" value="BCA"  <?php if(in_array("BCA",$e)) echo 'checked';  ?>/>
                   <label class="form-check-label" for="otherGender">BCA</label>
            </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender" value="B.COM" <?php if(in_array("B.COM",$e)) echo 'checked';  ?>/>
                   <label class="form-check-label" for="otherGender">B.COM</label>
            </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender" value="MBA" <?php if(in_array("MBA",$e)) echo 'checked';  ?>/>
                   <label class="form-check-label" for="otherGender">MBA</label>
            </div>

                </div>
              </div>
              <div class="row">
                <div class="col-12">

                <label class="form-label" for="lastName"><h6 class="mb-2 pb-1">City: </h6></label><br>
                  <select class="select form-control-lg" name="city" id="city" value="<?php  echo $city; ?>">
                    <option value="1" disabled>Choose option</option>
                    <option>Select </option>
                    <option value = "visnagar" <?php if($row['city']=="Visnagar") echo "selected";?>>Visnagar</option>
                    <option value="Amdabad" <?php if($row['city']=="Amdabad") echo "selected";?> >Amdabad</option>
                    <option value="Mehsana" <?php if($row['city']=="Mehsana") echo "selected";?> >Mehsana</option>
                    <option value="Gandhinagar" <?php if($row['city']=="Gandhinagar") echo "selected";?> >Gandhinagar</option>
                    <option value="Virpur" <?php if($row['city']=="Virpur") echo "selected";?> >Virpur</option>
                  </select>
                  <label class="form-label select-label">Choose option</label>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-success btn-lg" type="submit" value="Submit" name="cmd" />
                <!-- <input class="btn btn-success btn-lg" type="submit" value="Search" name="cmd" /> -->
              </div>
            </form>
               
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                  </div>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>