<?php
class registryHelper {

			static function outputRegisterForm() {
				return '<div class="row">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<strong>Neu hier ? Registriere dich</strong>  
									</div>
									<div class="panel-body" id="login">
										<form role="form" name ="frm_registerform" action="register.php" method="post"><br/>
											<div class="form-group input-group">
												<span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
												<input type="text" class="form-control" placeholder="Vorname" name="inp_vorname" required />
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
												<input type="text" class="form-control" placeholder="Nachname" name="inp_nachname" required />
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
												<input type="text" class="form-control" placeholder="Benutzername" name="inp_username" required />
											</div>
											 <div class="form-group input-group">
												<span class="input-group-addon">@</span>
												<input type="email" class="form-control" placeholder="Email Adresse" name="inp_email" required />
											</div>
										  <div class="form-group input-group password">
												<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
												<input type="password" class="form-control" placeholder="Passwort" name="inp_password" id="inp_password_id" required />
                                                <span class="input-group-addon" id="show_password_id"><i class="fa fa-eye" ></i></span>
											</div>
										 <div class="form-group input-group password">
												<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
												<input type="password" class="form-control " placeholder="Password erneut eingeben" name="inp_passwordagain" id="inp_passwordagain_id" required />
                                                <span class="input-group-addon" id="show_passwordagain_id"><i class="fa fa-eye" ></i></span>
											</div>
										 
										 <button type="submit" id="register_button_id" class="btn btn-primary">Registrieren</button>
										<hr />
										Bereits registriert ?  <a href="index.php" >Hier einloggen</a>
										</form>
                            	</div>
                        	</div>
                    	</div>
        			</div>';
		}
		
		static function outputRegistryError($err) {			
			return '<div class="alert alert-danger" role="alert"><center>'.$err.'</center></div><hr>';	
		}

		static function outputRegistrySuccess() {			
			return '<div class="alert alert-success" role="alert"><center>Ihre Registrierung war erfolgreich!</center></div><hr>';	
		}
		
		static function registerUser($vorname, $nachname, $username, $email, $password) { 
            global $DB; 
	    $rs = $DB->Execute("INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$vorname', '$nachname', '$username', '$email', '$password')");
	   if ($rs)
	     	return true;
	    else
	    	return false;
		
	   }
		
	}
?>