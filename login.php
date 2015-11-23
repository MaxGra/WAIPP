<?php
    session_start(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    

</head>
<body>

<?php
	
	require('includes/adodb/adodb.inc.php'); //integrates the adodb.inc.php file to the webpage	
	$DB = NewADOConnection('mysql'); //creates a new connection to the MySQL-database	
	$DB->Connect('localhost','root','','mydb'); //connect with: server, user, password, database 	
		
		
	class loginhelper { //class for help functions		
				
	    static function outputLoginForm() {	//returns my login layaout	
		return '<div class="container">
        			<div class="row text-center ">
            			<div class="col-md-12">
                			<br /><br />
                			<h2> Binary Admin : Login</h2>
               				<h5>( Login yourself to get access )</h5>
                 			<br />
            			</div>
        			</div>
         			
					<div class="row ">
               			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                        			<strong>Enter Details To Login</strong>  
                            	</div>
                            	<div class="panel-body">
                                	<form role="form" action="login.php" method="post">
                                    <br />
                                    <div class="form-group input-group">
                                    	<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                     	<input type="text" class="form-control" name="inp_username" id="inp_username _id" placeholder="Your Username " />
                                  	</div>
                                    <div class="form-group input-group">
                                 		<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                       	<input type="password" class="form-control"  name="inp_password" id="inp_password_id" placeholder="Your Password" />
                                 	</div>
                                    <div class="form-group">
                                    	<label class="checkbox-inline">
                                    		<input type="checkbox" /> Remember me
                                      	</label>
                                       	<span class="pull-right">
                                        	<a href="#" >Forget password ? </a> 
                                     	</span>
                                  	</div>
                                    <input type="submit" value="Login" class="btn btn-primary" />
                                    <hr />
                                    Not register ? <a href="registeration.html" >click here </a> 
                            	</form>
                            </div> 
                        </div>
                    </div>   
        		</div>
    		</div>';
	    }
			
	    static function outputLoginError($err) { //This function will be called if any errors occur		
			return '<div id="login_error">'.$err.'</div>';	//It returns the error-text inside a div-box
	    }
		
		static function outputLogoutForm() {
    		return '<form name="frm_logoutform" action="login_cookie.php" method="post">
      					<input name="logout" type="submit" value="Logout" />
      				</form>';
   		}
		
		static function outputLoginSuccess($username) {   // This function will be called if any errors occur.
    		//return '<div id="login_success">Willkommen ' . $username . '!</div>'; // It returns the error-text inside a div-box
			header('Location: index.php'); exit;
   		}
			
	    static function loginUser($username, $password) {	
			global $DB; 
			$rs = $DB->Execute("SELECT password FROM users WHERE username='$username'"); //This function will check if the given username and password fit the values in our database
				foreach($rs as $row) { //$DB wouldnt be found inside the class -> it must be referred to the global variable
				if($row['password'] == $password) //returns all record sets where the column username fits with the given uername
					return true;	
				}
					
				return false;
					
			}
		}
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
				  echo loginhelper::outputLoginSuccess($username);
				  echo loginhelper::outputLogoutForm();
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
				 echo loginhelper::outputLoginSuccess($_SESSION['username']);
				 echo loginhelper::outputLogoutForm();
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