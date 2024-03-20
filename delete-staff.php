<?php

//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../dstaff.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="gym";
$con=new mysqli($host,$dbusername,$dbpassword,$dbname);


$qry="delete from staff where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:../dstaff.php');
}else{
    echo"ERROR!!";
}
}
?>