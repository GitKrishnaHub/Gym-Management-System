<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
</head>
<body>
	
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="connect.php" method="post">
			
			<h1>Create Account</h1>
			<!-- <div class="social-container">
				<a href="https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="https://accounts.google.com/ServiceLogin/identifier?elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<button>Sign Up</button>
			
		</form>
	</div>
	<div class="form-container sign-in-container">
	
		<form action="login.php" method="post">
					<h1>Sign In</h1>
			<!-- <div class="social-container">
				<a href="https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="https://accounts.google.com/ServiceLogin/identifier?elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<!-- <a href="#">Forgot your password?</a> -->
			<button>Sign In</button>
		
		</form>
			<?php
   					$email=$_POST['email'];
   					$password=$_POST['password'];

   					$con=new mysqli("localhost","root","","gym");
   					if($con->connect_error)
					{
      					die("Failed to connect : ".$con->connect_error);
   					}
					else 
					{
    					$stmt=$con->prepare("select * from register where email='$email' and password='$password'");
      					$stmt->execute();
     					$stmt_result=$stmt->get_result();
      					if($stmt_result->num_rows>0)
						{
         					$data =$stmt_result->fetch_assoc();
         					if($data['password']===$password)
							{
            				header('location:dashboard.php');
         					}
      					}
						else
						{
        				 	echo "Invalid Email or password ";
      					}
   					}
			?>

	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



<script src="js/login.js"></script>
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