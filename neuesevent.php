
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Neues Event erstellen</h2>
                    </div>
                </div>
            
            <hr />

            <?php
                require('includes/adodb/adodb.inc.php'); 
                

                class createEvent {
                  static function outputRegisterForm() {
                      return '<div class="row">
                                <div class="col-md-12">
                                    <!-- Form Elements -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3>Event erstellen</h3>
                                                    <form role="form" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Event Name</label>
                                                            <input class="form-control" id="name" name="inp_name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Event Beschreibung</label>
                                                            <textarea class="form-control" rows="3" id="description" name="inp_description"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Neues Eventbild hochladen</label>
                                                            <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" />
                                                        </div>
                                                        <!--
                                                        <div class="form-group">
                                                            <label>Tische</label>
                                                            <input type="number" min="0" class="form-control" />
                                                        </div>-->
                                                        <div class="form-group">
                                                            <label>Anfangsdatum</label>
                                                            <input type="date" class="form-control" id="star_date" name="star_date" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Enddatum</label>
                                                            <input type="date" class="form-control" id="end_date" name="end_date" />
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label>Tische</label>
                                                            <input type="number" min="0" class="form-control" />
                                                        </div>-->
                                                        <button type="submit" class="btn btn-default" name="erstelle_event">Erstellen</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                  }

                static function outputEventError($err) {			
                    return '<div class="alert alert-danger" role="alert"><center>'.$err.'</center></div>';	
                }

                static function outputEventSuccess() {			
                    return '<div class="alert alert-success" role="alert"><center>Ihr Event wurde erfolgreich erfolgreich erstellt!</center></div>';
                }

                static function registerEvent($star_date, $end_date, $name, $description) { 
                   try {
                       $DB = NewADOConnection('mysql'); 
                       $DB->Connect('localhost','root','','usrdb_flhmnoco5');
                       $rs = $DB->Execute("INSERT INTO events (star_date, end_date, name, description) VALUES ('$star_date', '$end_date', '$name', '$description')");
                       $pk_event = $DB->Execute("SELECT (pk_event_id) FROM events ORDER BY pk_event_id DESC LIMIT 1;");
                       foreach($pk_event as $eventid){
                           
                           $id= intval($eventid['pk_event_id']);
                       }
                       
                       $userid = $_SESSION['id'];
                       $rs1 = $DB->Execute("INSERT INTO users_events (pk_fk_user_id, pk_fk_event_id) VALUES (".$userid.", ".$id.")");
                       
                       echo $DB->ErrorMsg();

                       if ($pk_event && $rs && $rs1)
                           return true;
                       else
                         return false;
                    }

                       catch (Exception $e) {
                           return false;
                       }
                }
              }
            ?>

            <section id="sec_login">
                <?php 
                    $error = "";
                    $userisregistered = false;
                    $target_dir = "pictures/";
                    $uploadOk = 1;
                
                
                    if (!$userisregistered) {		
                        echo createEvent::outputRegisterForm();
                        
                        if (isset($_POST['erstelle_event'])){
                            
                        
                        if (!(empty($_POST['inp_name'])) && !(empty($_POST['inp_description'])) && !(empty($_POST['star_date'])) && !(empty($_POST['end_date']))) {	

                                $star_date = htmlspecialchars($_POST['star_date']);
                                $end_date = htmlspecialchars($_POST['end_date']);
                                $name = htmlspecialchars($_POST['inp_name']);
                                $description = htmlspecialchars($_POST['inp_description']);

                                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                                if ($_FILES["fileToUpload"]["size"] > 500000) {
                                    echo "Sorry, your file is too large.";
                                    $uploadOk = 0;
                                }else{
                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                    } else {
                                        echo "Sorry, there was an error uploading your file.";
                                    }
                                }

                                if (strlen($name) > 30) {
                                    $error = "Eventname ist zu lang!";
                                }

                            else {

                                if (createEvent::registerEvent($star_date, $end_date, $name, $description)) {	
                                        echo createEvent::outputEventSuccess();
                                } else {
                                        $error = "Eventname already exists!";
                                        }
                                }
                        }else{
                            echo '<div class="alert alert-danger" role="alert"><center>Bitte alle Felder ausfüllen!</center></div>';
                        }
                    }
                        
                        if (strlen($error) > 0){	
                            echo createEvent::outputEventError($error);	
                        }
                    }
                
                ?>
            </section>
    </div>
