<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="../css/staff.css">
</head>

<body>
    <?php $page = 'staff';
    include 'sidebar.php' ?>

    <?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gym";
    @$id = $_GET['id'];
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    $qry = "select * from staff where user_id='$id'";
    $result = mysqli_query($conn, $qry);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="main">

            <form action="update-staff.php" method="post" role="form">
                <h1>UPDATE STAFF DETAILS</h1>
                <div class="row">
                    <div class="col">
                        <h4>Staff-Details</h4>
                        <div class="input-box">
                            <label class="control-label">Full Name :</label>
                            <input type="text" name="fullname" placeholder="Full Name" value='<?php echo $row['fullname']; ?>' required />
                        </div>
                        <div class="input-box">
                            <label class="control-label">Gender :</label>
                            <input type="text" class="input-box" name="gender" value='<?php echo $row['gender']; ?>' required />
                            <!-- <select name="gender" required="required" id="select">
                            <option value="Male" selected="selected">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select> -->
                        </div>

                        <div class="input-box">
                            <label class="control-label">Designation :</label>
                            <input type="text" class="input-box" name="designation" value='<?php echo $row['designation']; ?>' required />
                            <!-- <select name="designation" required="required" id="select">
                            <option value="Cashier" selected="selected">Cashier</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Manager">Manager</option>
                        </select> -->
                        </div>
                    </div>
                    <div class="cols">
                        <h4>Contact Details</h4>
                        <div class="input-box">
                            <label class="control-label">Email :</label>
                            <input type="email" name="email" placeholder="Enter Valid Email Address" value='<?php echo $row['email']; ?>' required />
                        </div>
                        <div class="input-box">
                            <label class="control-label">Contact Number</label>
                            <input type="number" id="mask-phone" name="contact" placeholder="9876543210" value='<?php echo $row['contact']; ?>' required />
                            <span>(999) 999-9999</span>
                        </div>
                        <div class="input-box">
                            <label class="control-label">Address :</label>
                            <input type="text" name="address" placeholder="Address" value='<?php echo $row['address']; ?>' required />
                        </div>

                    </div>
                </div>
                <div>
                    <button type="submit" class="button" name="id" value="<?php echo $row['user_id']; ?>" style="--clr:red">Submit Staff Details<i class='bx bx-save'></i></button>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage(newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-") {
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
<?php
if(!isset($_SESSION['user_id'])){
// header('location:../member.php');	
}
?>

<?php 
        
            if(isset($_POST['fullname'])){
                $fullname = $_POST["fullname"];
                $gender = $_POST["gender"];
                $designation = $_POST["designation"];
                $email = $_POST["email"];
                $contact = $_POST["contact"];
                $address = $_POST["address"];
                $id = $_POST['id'];

                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "gym";

         
            $con=new mysqli($host,$dbusername,$dbpassword,$dbname);
       
            $qry = "update staff set fullname='$fullname',gender='$gender',designation='$designation',email='$email', contact='$contact',  address='$address' where user_id='$id'";
            $result = mysqli_query($con,$qry); 

            if(!$result){
                echo"ERROR!!";
            }else {

                echo "<h3>...............UPDATED SUCCESSFULLY GO BACK TO <a href='dstaff.php'>STAFF DETAILS</a></h3>";

            }

            }
?>