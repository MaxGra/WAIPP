<?php
class profileHelper {
    static function outputProfile(){
        return '<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Mein  Profil</h2>   
                        <h5>benutzerdaten bearbeiten</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <form role="form">
                                        <p>Benutzername:</p>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user "  ></i></span>
                                            <input type="text" class="form-control" name="inp_username" id="inp_username_id"  value="'.$profiledata[1].'"/>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" name="inp_firstname" id="inp_firstname_id"  value="'.$profiledata[2].'" />
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user "  ></i></span>
                                            <input type="text" class="form-control" name="inp_lastname" id="inp_lastname_id"  value="'.$profiledata[3].'" />
                                        </div>

                                        <br>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope "  ></i></span>
                                            <input type="text" class="form-control" name="inp_email" id="inp_email _id"  value="'.$profiledata[4].'" />
                                        </div>


                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock "  ></i></span>
                                            <input type="text" class="form-control" name="inp_password" id="inp_password_id"  placeholder="Passwort " />
                                        </div>

                                        <br>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-male "  ></i></span>
                                            <input type="text" class="form-control" name="inp_role" id="inp_role_id"  placeholder="Rolle " />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-university "  ></i></span>
                                            <input type="text" class="form-control" name="inp_organisation" id="inp_organisation_id"  placeholder="Organisation(en) " />

                                        </div>

                                        <button type="button"class="form-control btn-success" name="inp_aendern" id="inp_aendern_id"> Ändern </button>
                                        

                                    </div>
                                        <div class="col-md-6">
                                            <br><br>
                                            <center><img class="image-responsive" src="" width="150px"/></center><br>
                                             <label class="control-label">Neuen Avatar auswählen</label>
                                             <input name="inp_upload" id="inp_upload_id" type="file" class="form-control btn-file">
                                             <input type="submit"class="form-control btn-success" name="inp_submit" id="inp_submit_id"/>
                                       
                                    </form>
                        
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>';
    }
    
    static function getUserdata($username){
        global $DB; 
			$rs = $DB->Execute("SELECT * FROM users WHERE username='$username'"); //This function will check if the given username and password fit the values in our database
				foreach($rs as $row) { //$DB wouldnt be found inside the class -> it must be referred to the global variable
                    return $row;
				}
    }
}
?>