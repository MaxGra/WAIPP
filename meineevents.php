<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Meine Events</h2>   
            <h5>Übersicht meiner Events</h5>
        </div>
    </div>
                 
    <hr />
    
    <?php 
        require('includes/adodb/adodb.inc.php'); 
        $DB = NewADOConnection('mysql'); 
        $DB->Connect('localhost','root','','usrdb_flhmnoco5'); 	

        $userID = $_SESSION['id'];

        $events1 = $DB->Execute("SELECT * FROM users_events where pk_fk_user_id='$userID'");
        foreach ($events1 as $event1) {
            $eventID = $event1['pk_fk_event_id'];
            $events = $DB->Execute("SELECT * FROM events where pk_event_id='$eventID'");
            foreach ($events as $event) {
                echo '<div class="row">
                            <div class="col-xs-12 event_container">           
                                <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-red set-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>
                                        <div class="text-box" >
                                            <a href="eventdetail.php?id='.$event['pk_event_id'].'">
                                                <p class="main-text">'.$event['name'].'</p>
                                            </a>
                                            <p class="text-muted">'.$event['description'].'</p>
                                            <p class="text-muted">'.$event['star_date'].' bis '.$event['end_date'].'</p>
                                        </div>
                                        <a href="#"><div class="div_icons_left"><i class="fa fa-pencil fa-2x"></i></div></a>
                                        <a href="index.php?seite=events&exp=del&id='.$event['pk_event_id'].'">
                                            <div class="div_icons_right"><i class="fa fa-trash-o fa-2x"></i></div>
                                        </a>
                                        <div class="event_status">
                                            Status: abgeschlossen
                                        </div>
                                    </div>
                            </div>
                        </div>';
            }
        }

        $exp = '';

        if(isset($_GET['exp']))
            $exp = $_GET['exp'];

            if($exp=='del') {
                $id = $_GET['id'];
                $deleteQuery = $DB->Execute("DELETE FROM users_events WHERE pk_fk_event_id='$id'");
                if($deleteQuery)
                    echo $DB->ErrorMsg();
                    echo "<meta http-equiv='refresh' content='0;url=index.php?seite=events'>";
            }

            if($exp=='edit') {
                $id = $_GET['id'];
                $editQuery = $DB->Execute("UPDATE events SET  users_events WHERE pk_fk_event_id='$id'");
                if($deleteQuery)
                    echo $DB->ErrorMsg();
                    echo "<meta http-equiv='refresh' content='0;url=index.php?seite=events'>";
            }
    ?>
    
</div>