<?php
class passwordresethelper{
    static function outputResetForm() {	//returns my login layaout	
		return '<form role="form" action="forgotpassword.php" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-email"  ></i></span>
                                            <input type="email" class="form-control" name="inp_email" id="inp_email_id"  placeholder="Email" />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-email"  ></i></span>
                                            <input type="email" class="form-control" name="inp_emailconfirm" id="inp_emailconfirm_id" placeholder="Email wiederholen" />
                                        </div>
                                    
                                       <center> <input type="submit" value="Passwort zurücksetzen" class="btn new" /></center>
                                    
                                    <hr />
                                     <span class="pull-left">
                                    <a href="registeration.html" class="btn new" >Registrierung </a> 
                                      </span>
                                           <span class="pull-right">
                                             <a href="forgotpassword.php" class="btn new">Passwort vergessen ? </a> 
                                           </span>
                                    </form>';
	    }
    static function resetPassword($email,$pass) {
			global $DB; 
			$DB->Execute("UPDATE users SET password='$pass' WHERE email='$email'"); //This function will check if the given username and password fit the values in our database
				/*foreach($rs as $row) { //$DB wouldnt be found inside the class -> it must be referred to the global variable
				if($row['password'] == $password) //returns all record sets where the column username fits with the given uername
					return true;	
				}
					
				return false;*/
            $to = $email;
            $subject = 'Waipp-Passwort zurückgesetzt';
            $message = "Hallo!\n\nWir haben den Auftrag bekommen dein Passwort zurückzusetzen\n\nDein neues Passwort lautet: ".$pass;
            $headers = "From: waipp@education4you.at\r\nReply-To: ".$email;
            $mail_sent = @mail( $to, $subject, $message, $headers );
            echo $mail_sent ? "Mail sent" : "Mail failed";		
			}
    
    static function checkEmail($email) {	
			global $DB; 
			$rs = $DB->Execute("SELECT email FROM users WHERE email='$email'"); //This function will check if the given username and password fit the values in our database
				foreach($rs as $row) { //$DB wouldnt be found inside the class -> it must be referred to the global variable
				if($row['email'] == $email) //returns all record sets where the column username fits with the given uername
					return true;	
				}
					
				return false;	
			}
    static function outputError($err){
        return $err;
    }
    
    static function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
}
?>