<?php
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 if(!empty($name)){
   if(!empty($email)){
      if(!empty($password)){
         $host="localhost";
         $dbusername="root";
         $dbpassword=""; 
         $dbname="gym";

         $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
         if(mysqli_connect_error()){
            die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());

         }
         else{
            $sql="INSERT INTO register (name, email,password) values('$name','$email','$password')";
            if($conn->query($sql)){
               header('location:login.php');
               echo"New record is inserted Sucessfully";
            }
            else{
               echo "Error : " .$sql . "<br>" .$conn->error;
            }
            $conn->close();
         }   
      }
      else{
         echo "Password should not be empty";
         die();
      }
   }
   else{
      echo "Email should not be Empty";
      die();
   } 
 }
 else{
   echo "Email should not be Empty";
   die();
}
?>


