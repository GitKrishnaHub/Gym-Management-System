<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/details.css">
</head>
<body>
    <?php $page='payment'; include 'sidebar.php'?>
    <section class="pay-section" id="pay-section">
        <div class="pay-content">
            <h1>Payment Details</h1>
            <!-- <label class="search">
              <input type="text" type="submit" name="search" value="<?php if (isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Search here" required>
              <i class='bx bx-search' type='submit'></i>
            </label> -->
        </div>
        <?php
            $conn=mysqli_connect("localhost","root","","gym");
            if(isset($_GET['search']))
            {
              $filtervalues=$_GET['search'];
              $query="SELECT * FROM member where concat(name,user_id) like '%$filtervalues%' ";
              $query_run=mysqli_query($conn,$query);
              if(mysqli_num_rows($query_run)>0){
                foreach($query_run as $items){
                  echo "krishna";
                 
                }
              }
              else{
                echo "No results found";
              }
            }
            ?>
          <div class='mem-content'>
	  
	  <?php

        $conn=new mysqli("localhost","root","","gym");
      $qry="select * from member";
      $cnt = 1;
        $result=mysqli_query($conn,$qry);

        
          echo"<table class='content-table'>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  
                  <th>Plan</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  <th>Choosen Service</th>
                  <th>Amount</th>
                
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
               
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['fullname']."</div></td>               
                <td><div class='text-center'>".$row['gender']."</div></td>
                
                <td><div class='text-center'>".$row['plan']." Month/s</div></td>
                <td><div class='text-center'>".$row['contact']."</div></td>                
                <td><div class='text-center'>".$row['address']."</div></td>
                <td><div class='text-center'>".$row['services']."</div></td>
                <td><div class='text-center'>$".$row['amount']."</div></td>
                
                
             
                
              </tbody>";
          $cnt++;  }
            ?>

            </table>
        </div>
    </div>
    </section>
          
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