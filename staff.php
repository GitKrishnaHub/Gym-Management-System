<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="css/staff.css">
</head>

<body>
<?php $page = 'staff';include 'sidebar.php' ?>
    <div class="main">
        
        <form action="staff.php" method="post" role="form">
        <h1>STAFF MEMBER DETAILS</h1>
            <div class="row">
                <div class="col">
                    <h4>Staff-Details</h4>
                    <div class="input-box">
                        <label class="control-label">Full Name :</label>
                        <input type="text" name="fullname" placeholder="Full Name" required/>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Gender :</label>
                        <select name="gender" required="required" id="select">
                            <option value="Male" selected="selected">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                
                    <div class="input-box">
                        <label class="control-label">Designation :</label>
                        <select name="designation" required="required" id="select">
                            <option value="Cashier" selected="selected">Cashier</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
                </div>
                <div class="cols">
                    <h4>Contact Details</h4>
                    <div class="input-box">
                        <label class="control-label">Email :</label>
                        <input type="email" name="email" placeholder="Enter Valid Email Address" required/>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Contact Number</label>
                        <input type="number" id="mask-phone" name="contact" placeholder="9876543210" required/>
                        <span>(999) 999-9999</span>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Address :</label>
                        <input type="text" name="address" placeholder="Address"  required/>
                    </div>
                   
                </div>
            </div>
            <div>
                <button type="submit" class="button" style="--clr:red">Submit Staff Details<i class='bx bx-save'></i></button>
            </div>
        </form>
        <?php
        if(isset($_POST['fullname']))
        {
            $fullname=$_POST["fullname"];
            $gender=$_POST["gender"];
            $designation=$_POST["designation"];
            $email=$_POST["email"];
            $contact=$_POST["contact"];
            $address=$_POST["address"];
            
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="gym";
         
            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if(mysqli_connect_error())
            {
                die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
            }
            else{
                $sql="INSERT INTO staff (fullname,gender,designation,email,contact,address) values('$fullname','$gender','$designation','$email','$contact','$address')";
                if ($conn->query($sql)) {
                    // echo"New record is inserted Sucessfully";
                    // header('Location:../dstaff.php');
                    // header('location:staff.php');
                } else {
                        echo "Error : " .$sql . "<br>" .$conn->error;
                }
                    $conn->close();
            }
        }
        ?>
    </div>
    <script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>