<?php
    session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WAIPP</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    -->

</head>
<body>

<?php
	
	require('includes/adodb/adodb.inc.php'); //integrates the adodb.inc.php file to the webpage	
    require('includes/helpers/loginhelper.inc.php');
	$DB = NewADOConnection('mysql'); //creates a new connection to the MySQL-database	
	$DB->Connect('127.0.0.1','flhmnoco5','k8skf1ni','usrdb_flhmnoco5'); //connect with: server, user, password, database 	
		
?>
    
<section id="sec_login">
		<?php
  
			   $error = "";
			   $userisloggedin = false;
				
			   if (!isset($_SESSION['username'])) {
			   
				//     name of username input     name of password input
				if (isset($_POST['inp_username']) && isset($_POST['inp_password'])) { // if the variables exist (if the user typed in his username and password)
								  // $_POST is the value, which the user wrote into the input fields
				 // htmlspecialchars translates special characters into their html-value
				 // because some special characters would cause unwanted effects on the database 
				 $username = htmlspecialchars($_POST['inp_username']);
				 $password = htmlspecialchars($_POST['inp_password']);
				 
				 if (loginhelper::loginUser($username, $password)) {  // if the values of the given username and password fit with the values in the database
				  
				  $_SESSION['username'] = $username;
				 // echo loginhelper::outputLoginSuccess($username);
				 // echo loginhelper::outputLogoutForm();
                    include('home.php');
				  $userisloggedin = true;
				 }
				 else {
				  $error = "Username or password wrong!";
				 }
				}
			   
			   } else {
				
				if (isset($_POST['logout'])) {
				 $userisloggedin=false;
				 unset($_SESSION['username']);
				 session_destroy();
				}
				
				else {
				 $userisloggedin=true;
                    include('home.php');
				// echo loginhelper::outputLoginSuccess($_SESSION['username']);
				// echo loginhelper::outputLogoutForm();
				}
				
			   }
			
			if (!$userisloggedin) {  // if the user isn't logged in
			echo loginhelper::outputLoginForm(); // print login-form
				
				if (strlen($error)>0) // if the error-string contains more than 0 characters
				 echo loginhelper::outputLoginError($error); // print error
			   }
		?>
	</section>

   
   
</body>
</html>
<?php
    $DB->Close(); //close database, so that no ressources get wasted
?>