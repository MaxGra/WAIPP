<?php
class menuHelper {
    static function outputHeader() {
        return '<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WAIPP Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
      <form name="frm_logoutform" action="index.php" method="post">
      					<input class="btn btn-danger square-btn-adjust" name="logout" type="submit" value="Logout" />
      				</form>
        </nav> ';
    }
    
    static function outputKellnerHeader() {
        return '<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WAIPP Kellner</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
      <form name="frm_logoutform" action="index.php" method="post">
      					<input class="btn btn-danger square-btn-adjust" name="logout" type="submit" value="Logout" />
      				</form>
        </nav> ';
    }
    
    static function outputMenu() {
        return '<nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="pictures/WP_Logo_V1.svg" class="user-image img-responsive"/>
                            </li>
                            <li>
                                <a name="menu" href="index.php" onclick="menuHighlight(0)"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                            </li>  	
                              <li >
                                <a  id="meineevents_id" name="menu" href="index.php?seite=events" onclick="menuHighlight(1)"><i class="fa fa-table fa-3x"></i>Meine Events</a>
                            </li>
                            <li  >
                                <a  name="menu" href="index.php?seite=neuesevent"><i class="fa fa-edit fa-3x"></i>Neues Event </a>
                            </li>				
                             <li  >
                                <a id="profile_id" name="menu" href="index.php?seite=profil"><i class="fa fa-bolt fa-3x"></i>Mein Profil</a>
                            </li>	
                             <li  >
                                <a href="einstellungen.html" name="menu"><i class="fa fa-laptop fa-3x"></i>Einstellungen</a>
                            </li>		
                        </ul>
                    </div>
                </nav>';
    }
    
    static function outputKellnerMenu() {
        return '<nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="pictures/WP_Logo_V1.svg" class="user-image img-responsive"/>
                            </li>
                            <li>
                                <a name="menu" href="index.php" onclick="menuHighlight(0)"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                            </li>  	
                              <li >
                                <a  id="meineevents_id" name="menu" href="index.php?seite=events" onclick="menuHighlight(1)"><i class="fa fa-table fa-3x"></i>Events</a>
                            </li>
                            <li  >
                                <a  name="menu" href="index.php?seite=neuesevent"><i class="fa fa-edit fa-3x"></i>Neues Event </a>
                            </li>				
                             <li  >
                                <a id="profile_id" name="menu" href="index.php?seite=profil"><i class="fa fa-bolt fa-3x"></i>Mein Profil</a>
                            </li>	
                             <li  >
                                <a href="einstellungen.html" name="menu"><i class="fa fa-laptop fa-3x"></i>Einstellungen</a>
                            </li>		
                        </ul>
                    </div>
                </nav>';
    }
    
}
?>