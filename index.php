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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
    <script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="assets/js/scripts.js"></script>
 

</head>
<body>
    
    <script>
        $(function() {
            $('#show_password_id').mouseup(function() {     
                $('#inp_password_id').attr("type","password");
            }).mousedown(function() {
                $('#inp_password_id').attr("type","text");
            });
            
            $('#register_id').click(function(){
                post('', {content: 'Register'});
            });
            
        });
    </script>

<?php
	
	require('includes/adodb/adodb.inc.php'); //integrates the adodb.inc.php file to the webpage
    require('includes/helpers/menuhelper.inc.php');
    require('includes/helpers/loginhelper.inc.php');
    require('includes/helpers/dashboardhelper.inc.php');
    require('includes/helpers/profilehelper.inc.php');
    require('includes/helpers/registerhelper.inc.php');
	$DB = NewADOConnection('mysql'); //creates a new connection to the MySQL-database	
	$DB->Connect('localhost','root','','usrdb_flhmnoco5'); //connect with: server, user, password, database 	
		
?>
    
<section id="sec_login">
		<?php
  
			   $error = "";
			   $userisloggedin = false;
    
                if (isset($_POST['content'])){
                    $content = htmlspecialchars($_POST['content']);
                    if($content == 'Register'){
                    include('register.php'); 
                    }
                }
                else{

			   if (!isset($_SESSION['username'])) {
			   
				//     name of username input     name of password input
				if (isset($_POST['inp_username']) && isset($_POST['inp_password'])) { // if the variables exist (if the user typed in his username and password)
								  // $_POST is the value, which the user wrote into the input fields
				 // htmlspecialchars translates special characters into their html-value
				 // because some special characters would cause unwanted effects on the database 
				 $username = htmlspecialchars($_POST['inp_username']);
				 $password = htmlspecialchars($_POST['inp_password']);
				 
				 if (loginhelper::loginUser($username, $password)) {// if the values of the given username and password fit with the values in the database
                        $_SESSION['username'] = $username;
                        $myrole = loginhelper::getUserRole($username);
                        $myid = loginhelper::getUserId($username);
                        $_SESSION['id'] = $myid;
                        $_SESSION['role'] = $myrole;
                        $userisloggedin = true;
                     if($myrole == "admin"){
                        include('home.php');
                     }
                     if($myrole == "kellner"){
                        include('kellnerhome.php');
                     }
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
                 if($_SESSION['role'] == "admin"){
                        include('home.php');
                     }
                     if($_SESSION['role'] == "kellner"){
                        include('kellnerhome.php');
                     }
				}
				
			   }
			
			if (!$userisloggedin) {  // if the user isn't logged in
			//echo loginhelper::outputLoginForm(); // print login-form
                include('login.php');
				
				if (strlen($error)>0) // if the error-string contains more than 0 characters
				 echo loginhelper::outputLoginError($error); // print error
			   }
                }
		?>
	</section>
   
</body>
    
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="menu.js"></script>
    
</html>
<?php
    $DB->Close(); //close database, so that no ressources get wasted
?>