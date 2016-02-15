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
     <!-- GOOGLE something FONTS-->
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
            $('#show_passwordagain_id').mouseup(function() {     
                $('#inp_passwordagain_id').attr("type","password");
            }).mousedown(function() {
                $('#inp_passwordagain_id').attr("type","text");
            });
            
            $("#inp_password_id").keyup(checkPasswordMatch);
            $("#inp_passwordagain_id").keyup(checkPasswordMatch);
            
            
        });
    </script>
    
    
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h1>WAIPP</h1>
                 <br />
            </div>
        </div>
        
        
    </div>
    <section id="sec_login">
		
		<?php 

			$error = "";
			$userisregistered = false;
	
			if (!empty($_POST['inp_vorname']) && !empty($_POST['inp_nachname']) && !empty($_POST['inp_username']) && !empty($_POST['inp_email']) && !empty($_POST['inp_password']) && !empty($_POST['inp_passwordagain'])) {	
	
			$vorname = htmlspecialchars($_POST['inp_vorname']);
			$nachname = htmlspecialchars($_POST['inp_nachname']);
			$username = htmlspecialchars($_POST['inp_username']);
			$email = htmlspecialchars($_POST['inp_email']);
			$password = htmlspecialchars($_POST['inp_password']);
			$passwordagain = htmlspecialchars($_POST['inp_passwordagain']);
		
			if (strlen($username) > 30) {
				$error = "Username is too long!";
			}
		
			else if (strlen($email)>30) {
				$error = "Email address too long. Make sure that the email address has less than 30 characters";
			}
		
			else {
	
				if (registryhelper::registerUser($vorname, $nachname, $username, $email, $password)) {		
						echo registryhelper::outputRegistrySuccess();
                        $_SESSION['username'] = $username;
                        $userisregistered = true;
                        
                        /*$r = new HttpRequest('http://education4you.at/waipp/app/register.php', HttpRequest::METH_POST);
                        $r->setOptions(array('cookies' => array('lang' => 'de')));
                        $r->addPostFields(array('success' => 'success'));
                        try {
                            echo $r->send()->getBody();
                        } catch (HttpException $ex) {
                            echo $ex;
                        }*/
                        /*echo '<script type="text/javascript">
                        window.location = "http://education4you.at/waipp/app/index.php"
                        </script>';*/
				    } else {
						$error = "Username or Email already exists!";
                    
						}
				}
		}
		
		if (!$userisregistered) {		
			
	
			if (strlen($error) > 0){	
				echo registryhelper::outputRegistryError($error);	
			}
            echo registryhelper::outputRegisterForm(); 
	}

?>
</section>
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS 
    <script src="assets/js/custom.js"></script>-->
</body>
</html>