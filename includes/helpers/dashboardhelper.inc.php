<?php
    class dashboardHelper { //class for help functions				
	    static function outputDashboard() {	//returns my login layaout	   
            return '<div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Dashboard</h2>   
                                <h5>Willkommen Admin, schön dich wieder zu sehen.</h5>
                            </div>
                        </div>              
                        
                        <hr />
                                    
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6">           
                                <div class="panel panel-back noti-box">
                                    <span class="icon-box bg-color-green set-icon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <div class="text-box" >
                                        <p class="main-text">Meine Events</p>
                                        <p class="text-muted">3 geplante Events</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
    
    }
?>