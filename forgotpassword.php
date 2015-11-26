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
    require('includes/helpers/passwordresethelper.inc.php');
	$DB = NewADOConnection('mysql'); //creates a new connection to the MySQL-database	
	$DB->Connect('127.0.0.1','flhmnoco5','k8skf1ni','usrdb_flhmnoco5'); //connect with: server, user, password, database 	
    
    echo passwordresethelper::outputResetForm();
		
?>
	</section>
    
    <?php
        if (isset($_POST['inp_email']) && isset($_POST['inp_emailconfirm'])) {
            $email1 = htmlspecialchars($_POST['inp_email']);
            $email2 = htmlspecialchars($_POST['inp_emailconfirm']);
            if ($email1 == $email2){
                if (passwordresethelper::checkEmail($email1)) {
                    passwordresethelper::resetPassword($email1,passwordresethelper::randomPassword());   
                }else{
                    echo passwordresethelper::outputError('Kein Account mit dieser Email vorhanden');
                }
            }else{
                echo passwordresethelper::outputError('Emails stimmen nicht überein');
            }
        }
    ?>

   
   
</body>
</html>
<?php
    $DB->Close(); //close database, so that no ressources get wasted
?>