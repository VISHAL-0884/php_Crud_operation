<?php
      $cn = "";
      $fname="";
      $lname="";
      $address="";
      $gender="";
      $email="";
      $city="";
      $education_arry="";
      $education_str="";
      $cmd = "";
      $msg = "";
      $row = "";

          include "db.php";

      if (isset($_POST['cmd'])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $address = $_POST["address"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $city = $_POST["city"];
            $education_arry = $_POST['ch'];
            $education_str = implode(",",$education_arry);
            $cmd = $_POST['cmd'];  
            

             // $cn = ("mysql:host=localhost;dbname=practice","root","");

            // insert the database table
            $sql ="insert into student(fname,lname,address,gender,email,education,city)
            values(:fname,:lname,:address,:gender,:email,:education,:city)";

            $insert = $cn->prepare($sql);

            $insert->bindParam(":fname",$fname);
            $insert->bindParam(":lname",$lname);
            $insert->bindParam(":address",$address);
            $insert->bindParam(":gender",$gender);
            $insert->bindParam(":email",$email);
            $insert->bindParam(":education",$education_str);
            $insert->bindParam(":city",$city);

            if ($insert->execute()) {

                   header("Location:read.php");

            }
            else {
                        $msg = "Data not succesfully inserted..";
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
    <title>Student Registration</title>
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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="text-transform:uppercase;">Student Registration Form</h3>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?php echo $msg;?></h3>

            <form method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">

                <div class="form-outline" type="hydden">
                    <input type="hidden" placeholder="first name" id="firstName" name="id" class="form-control form-control-lg" />
                    
                  </div>

                  <div class="form-outline">
                    <input type="text" placeholder="first name" id="firstname" name="fname" class="form-control form-control-lg" value="<?php  echo $fname; ?>" />
                    <label class="form-label" for="firstname"><h6 class="mb-2 pb-1">First Name: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" placeholder="last name" id="lastName" name="lname" class="form-control form-control-lg" value="<?php  echo $lname; ?>"/>
                    <label class="form-label" for="lastName"><h6 class="mb-2 pb-1">Last Name: </h6></label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <textarea id="address" placeholder="enter address" name="address" id="" cols="30" rows="3" name="address" class="form-control form-control-lg" value="<?php  echo $address; ?>"></textarea>
                    <label class="form-check-label" for="address"><h6 class="mb-2 pb-1">Address: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" id="femaleGender"
                      value="option1" checked />
                    <label class="form-check-label" for="femaleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="other" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" value="<?php  echo $email; ?>"/>
                    <label class="form-label" for="emailAddress"><h6 class="mb-2 pb-1">Email: </h6></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                <h6 class="mb-2 pb-1">Education: </h6>

            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="ch[]" id="femaleGender"
                         value="MCA" />
                   <label class="form-check-label" for="femaleGender">MCA</label>
            </div>

            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="ch[]" id="maleGender"value="BSC" />
                  <label class="form-check-label" for="maleGender">BSC</label>
             </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender"
                  value="BCA" />
                   <label class="form-check-label" for="otherGender">BCA</label>
            </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender"
                  value="B.COM" />
                   <label class="form-check-label" for="otherGender">B.COM</label>
            </div>

            <div class="form-check form-check-inline">
                   <input class="form-check-input" type="checkbox" name="ch[]" id="otherGender"
                  value="MBA">
                   <label class="form-check-label" for="otherGender">MBA</label>
            </div>

                </div>
              </div>
              <div class="row">
                <div class="col-12">

                <label class="form-label" for="lastName"><h6 class="mb-2 pb-1">City: </h6></label><br>
                  <select class="select form-control-lg" name="city" id="city" value="<?php  echo $city; ?>">
                    <option value="1" disabled>Choose option</option>
                    <option >Select </option>
                    <option>Visnagar</option>
                    <option>Amdabad</option>
                    <option>Mehsana</option>
                    <option>Gandhinagar</option>
                    <option>Virpur</option>
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