<?php
include_once 'config/config.php';
include_once 'class/user-class.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$user = new Users();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($email, $password );
	if($login){
		header("location: index.php");
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Final Project</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

    <div class="left-side">
      <div id="logo">
        <img src="img/Web-API-logo.svg" alt="website-logo" style="width: 75px; height: 75px;">
      </div>
      <div class="title">
        <h1>Welcome to Our Website</h1>
        <p>lorem ipsum dolor sit amet.</p>
      </div>
      <div class="mainbtn">
        <button>Join Us</button>
      </div>  
    </div>


    <div class="right-side">
      <form method="POST" name="login" onsubmit="">
        <h3 class="loginText">Welcome Back</h3>
        <p class="loginText">You were missed!</p>
        
          <input type="text" class="input" required name="email" placeholder="Email" oninvalid="this.setCustomValidity('Enter valid email')" oninput="this.setCustomValidity('')">
          <input type="password" class="input" required name="password" placeholder="Password" oninvalid="this.setCustomValidity('Enter valid password')" oninput="this.setCustomValidity('')">
          <a href="http://">Forgot Password?</a>
          <button class="signIn" type="submit" name="submit" value="Submit">Sign in</button>
          <hr>
          <p>or sign in</p>

          <button class="google">
            <img src="img/googleicon.svg" alt="google sign in">
            <div id="googletext">Sign In with google</div>
          </button>
          <div class="signup">
            No account yet? <span class="signup">Sign Up</span>
          </div>
      </form>    
    </div> 

  </body>
</html>