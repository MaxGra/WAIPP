<?php
class loginhelper { //class for help functions				
	    static function outputLoginForm() {	//returns my login layaout	
		return '<center>
        <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                
                 <br />
            </div>
        </div>
         <div class="row">

   <div class="col-md-12 col-sm-12">  
    <div class="col-md-8 col-sm-6 col-xs-12">
     

         <div class="panel panel-default">
                            <div class="panel-heading ">
                        <strong>   Login </strong>  
                            </div>
                            <div class="panel-body" id="login">
                                <form role="form" action="login.php" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" name="inp_username" id="inp_username _id"  placeholder="Your Username " />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="inp_password" id="inp_password_id" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Angemeldet bleiben
                                            </label>
                                            
                                    </div>
                                    
                                       <center> <input type="submit" value="Login" class="btn new" /></center>
                                    
                                    <hr />
                                     <span class="pull-left">
                                    <a href="registeration.html" class="btn new" >Registrierung </a> 
                                      </span>
                                           <span class="pull-right">
                                             <a href="forgotpassword.php" class="btn new">Passwort vergessen ? </a> 
                                           </span>
                                    </form>

                            </div>
          
      
    </div>

  </div>
  <div align="left"
       <div class="col-md-4 col-sm-6 col-xs-0">

          <img src="assets/img/waipp.png"  class="img-responsive" width="220px"/>
      </div>
  </div>
</div>

</center>
';
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