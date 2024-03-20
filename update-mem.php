<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/member.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
</head>

<body>
<?php $page = 'member';include 'sidebar.php' ?>
<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="gym";
@$id=$_GET['id'];
$con=new mysqli($host, $dbusername, $dbpassword, $dbname);
$qry= "select * from member where user_id='$id'";
$result=mysqli_query($con, $qry);
while ($row=mysqli_fetch_array($result)) {
?> 
    <div class="main">
        <form role="form" action="update-mem.php" method="post">
            <h1>UPDATE MEMBER DETAILS</h1>
            <div class="row">
                <div class="col">
                    <h4>Personal-Info</h4>
                    <div class="input-box">
                        <label class="control-label">Full Name :</label>
                        <input type="text" name="fullname" placeholder="Full Name" value='<?php echo $row['fullname']; ?>' required/>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Gender :</label>
                        <input type="text" class="span11" name="gender" value='<?php echo $row['gender']; ?>' required/>
                       
                    </div>
                    <div class="input-box">
                        <label class="control-label">D.O.R :</label>
                        <input type="date" name="dor" value='<?php echo $row['dor']; ?>' required/>
                        <span>Date of registration</span>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Plans :</label>
                        <input type="text" class="input-box" name="plan" value='<?php echo $row['plan']; ?>' required/>
                        
                    </div>
                </div>


                <div class="col">
                    <h4>Contact Details</h4>
                    <div class="input-box">
                        <label class="control-label">Contact Number</label>
                        <input type="number" id="mask-phone" name="contact" placeholder="9876543210" value='<?php echo $row['contact']; ?>' required/>
                        <span>(999) 999-9999</span>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Address :</label>
                        <input type="text" name="address" placeholder="Address" value='<?php echo $row['address']; ?>' required/>
                    </div>

                    <h4>Service Details</h4>
                    <div class="input-box">
                        <label class="control-label">Service</label>
                        <input type="text" name="services" placeholder="services" value='<?php echo $row['services']; ?>' required/>
                        
                     </div>
                    <div class="input-box">
                        <label class="control-label">Total Amount</label>
                        <div class="input-append">
                            <span class="add-on"></span>
                            <input type="number" placeholder="50" name="amount" class="span11" value='<?php echo $row['amount']; ?>'  required/>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="button" name="id" value="<?php echo $row['user_id'];?>" style="--clr:#1e9bff">Submit Member Details<i></i></button>
            </div>
        </form>
    </div>
<?php
}
?>
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
<?php
if(!isset($_SESSION['user_id'])){	
}
?>
<?php 
    if(isset($_POST['fullname'])){
    $fullname=$_POST["fullname"];
    $gender=$_POST["gender"];
    $dor=$_POST["dor"];
    $plan=$_POST["plan"];
    $contact=$_POST["contact"];
    $address=$_POST["address"];
    $services=$_POST["services"];
    $amount=$_POST["amount"];
    $id = $_POST["id"];
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="gym";
    $con=new mysqli($host,$dbusername,$dbpassword,$dbname);
    $qry = "update member set fullname='$fullname',gender='$gender',dor='$dor',plan='$plan', contact='$contact',  address='$address', services='$services',amount='$amount' where user_id='$id'";
    $result = mysqli_query($con,$qry); 
    if(!$result){
        echo"ERROR!!";
    }else {
        echo "<h3>...............UPDATED SUCCESSFULLY GO BACK TO <a href='dmem.php'>MEMBER DETAILS</a></h3>";
    }
    }
?>