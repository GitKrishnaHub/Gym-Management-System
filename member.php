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
    <?php $page = 'member';
    include 'sidebar.php' ?>
    <div class="main">
        <form role="form" action="member.php" method="post">
            <h1>MEMBER DETAILS</h1>
            <div class="row">
                <div class="col">
                    <h4>Personal-Info</h4>
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
                        <label class="control-label">D.O.R :</label>
                        <input type="date" name="dor" required/>
                        <span>Date of registration</span>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Plans :</label>
                        <select name="plan" required="required" id="select">
                            <option value="1" selected="selected">One Month</option>
                            <option value="3">Three Month</option>
                            <option value="6">Six Month</option>
                            <option value="12">One Year</option>
                        </select>
                    </div>
                </div>


                <div class="col">
                    <h4>Contact Details</h4>
                    <div class="input-box">
                        <label class="control-label">Contact Number</label>
                        <input type="number" id="mask-phone" name="contact" placeholder="9876543210" required/>
                        <span>(999) 999-9999</span>
                    </div>
                    <div class="input-box">
                        <label class="control-label">Address :</label>
                        <input type="text" name="address" placeholder="Address" required/>
                    </div>

                    <h4>Service Details</h4>
                    <div class="input-box">
                        <label class="control-label">Service</label>
                        <div class="controls">
                            <label>
                                <input type="radio" value="Fitness" name="services" required/>
                                Fitness</label>
                            <label>
                                <input type="radio" value="Cardio" name="services" required/>
                                Cardio</label>
                            <label>
                                <input type="radio" value="Gymnastic" name="services" required/>
                                Gymnastic</label>
                            <label>
                                <input type="radio" value="Yoga" name="services" required/>
                                Yoga</label>
                        </div>
                     </div>
                    <div class="input-box">
                        <label class="control-label">Total Amount</label>
                        <div class="input-append">
                            <span class="add-on"></span>
                            <input type="number" placeholder="50" name="amount" class="span11" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="button" style="--clr:#1e9bff">Submit Member Details<i></i></button>
            </div>
        </form>
        <?php
        if(isset($_POST['fullname']))
        {
            $fullname=$_POST["fullname"];
            $gender=$_POST["gender"];
            $dor=$_POST["dor"];
            $plan=$_POST["plan"];
            $contact=$_POST["contact"];
            $address=$_POST["address"];
            $services=$_POST["services"];
            $amount=$_POST["amount"];
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
                $sql="INSERT INTO member(fullname,gender,dor,plan,contact,address,services,amount) values('$fullname','$gender','$dor','$plan','$contact','$address','$services','$amount')";
                if ($conn->query($sql)) {
                    // echo"INSERTED";
                    // header('location:../dmem.php');
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