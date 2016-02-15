<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Mein  Profil</h2>   
            <h5>Benutzerdaten bearbeiten</h5>
        </div>
    </div>
                 
    <hr />
    
    <?php
        require('includes/adodb/adodb.inc.php'); 
        $DB = NewADOConnection('mysql'); 
        $DB->Connect('localhost','root','','usrdb_flhmnoco5');

        //$id = $_GET['id'];
        $data = $DB->Execute("SELECT * FROM users where username = '".$_SESSION['username']."'");
        //$data = $DB->Execute("SELECT * FROM users where pk_user_id='$_SESSION["first_name"]'");    

        foreach ($data as $profiledata) {
            echo '<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" method="post">
                                            <p>Benutzername:</p>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="inp_username" id="inp_username_id"  value="'.$profiledata[1].'"/>
                                            </div>

                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="inp_firstname" id="inp_firstname_id"  value="'.$profiledata[2].'" />
                                            </div>

                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
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
                                            
                                            <div>Id '.$_SESSION['id'].'</div>
                                
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-male "  ></i></span>
                                                <input type="text" class="form-control" name="inp_role" id="inp_role_id"  placeholder="Rolle " />
                                            </div>
                                
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-university "  ></i></span>
                                                <input type="text" class="form-control" name="inp_organisation" id="inp_organisation_id"  placeholder="Organisation(en) " />
                                    </div>

                                    <a href="index.php?seite=profil&exp=edit">
                                        <button type="button"class="form-control btn-success" name="inp_aendern" id="inp_aendern_id"> Ändern </button>
                                    </a>
                                        
                                </div>
                        
                                <div class="col-md-6">
                                    <br><br>
                                    <center><img class="image-responsive" src="" width="150px"/></center><br>
                                    <label class="control-label">Neuen Avatar auswählen</label>
                                    <input name="inp_upload" id="inp_upload_id" type="file" class="form-control btn-file">
                                    <input type="button" class="form-control btn-success" name="inp_submit" id="inp_submit_id"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>';
            
            $exp='';
            
            if(isset($_GET['exp']))
                $exp = $_GET['exp'];

            if($exp=='edit') {
                $username = $_GET['username'];
                $username = $_POST['inp_username'];
                echo $username;
                $editQuery = $DB->Execute("UPDATE users SET username='$username' WHERE pk_user_id='$id'");
                if($editQuery)
                    echo $DB->ErrorMsg();
                    //echo "<meta http-equiv='refresh' content='0;url=index.php?seite=events'>";
            }
        }
?>
    
</div>