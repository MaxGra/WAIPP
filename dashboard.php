<div id="page-inner">
    
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>   
            <h5>Willkommen <?php echo $_SESSION['username'];?>, schön dich wieder zu sehen.</h5>
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
                    <p class="text-muted"><?php
                        //Count events
                        echo "3 geplante Events";
                    ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-12 col-xs-12 ">
            <div class="panel">
                <div class="main-temp-back">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6"> <i class="fa fa-cloud fa-3x"></i> Wien </div>
                                <div class="col-xs-6">
                                    <div class="text-temp">-2°</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div
            </div>
        </div>
        
    </div>
        
</div>