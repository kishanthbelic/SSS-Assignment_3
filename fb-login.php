<?php 

require_once ("conf.php");

if(!session_id()) {
    session_start();
}


/*
if (isset($_SESSION['fb_access_token'])) {
        header('Location: fb-callback.php');
        exit();
    }
  */  



$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost:8080/OAuth/fb-callback.php', $permissions);


?>


<!DOCTYPE html>
<html>

<head>
    <title>Secure Software Systems - Assignment 3</title>		
<link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>
		
	
<div class="login">


<h1 style="font-size: 35px;text-align:center;color: #dff9fb;">Secure Software Systems </br> Assignment 3</h1>
        <h1 style="text-align:center;color: #95afc0">OAuth 2.0</h1>
    <hr>

	<h1>Login</h1>
    <form method="POST" >
    	<input type="text" name="user" placeholder="Username" />
		<input type="password" name="pass" placeholder="Password"/>
		<input type="hidden" name="user_csrf" id="IdOfToken" value="<?php echo $token ?>" /> 
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        
        <button type="button" name="login_fb" onclick="window.location = '<?php echo $loginUrl ?>';" class="btn btn-primary btn-block btn-large" style="margin-top: 10px">Login with Facebook</button>
        

    </form>

    <p style="text-align:center;color: #95afc0">Done by <a href="#">Kishanth - IT16062016</a></p>
</div>

</body>
</html>