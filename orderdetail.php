<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WAIPP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
        
        #logout {
            color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;
        }
        
    </style>
</head>
<body>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">WAIPP</a> 
            </div>
            <div id="logout"><a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a></div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="pictures/WP_Logo_V1.svg" class="user-image img-responsive"/>
					</li>
                    <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Dashboard</a></li>  	
                    <li><a class="active-menu" href="index.php?seite=events"><i class="fa fa-table fa-3x"></i>Meine Events</a></li>
                    <li><a href="neuesevent.html"><i class="fa fa-edit fa-3x"></i>Neues Event</a></li>
				    <li><a href="index.php?seite=profil" href="profil.html"><i class="fa fa-user fa-3x"></i>Mein Profil</a></li>
                    <li><a href="einstellungen.html"><i class="fa fa-laptop fa-3x"></i>Einstellungen</a></li>		
                </ul>
            </div>
        </nav>
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                    require('includes/adodb/adodb.inc.php'); //integrates the adodb.inc.php file to the webpage
                    $DB = NewADOConnection('mysql'); 
                    $DB->Connect('localhost','root','','usrdb_flhmnoco5'); 	

                    $ID = $_GET['id'];
                    $bestellDetails = $DB->Execute("SELECT * FROM orders_products where pk_fk_order_id=$ID");
                    $titeln = $DB->Execute("SELECT * FROM orders where pk_order_id=$ID");

                    foreach ($titeln as $titel) {
                        echo '<h1>'.$titel['name'].'</h1>';
                    }

                    echo '<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Produkt</th>
                                            <th>EinzelPreis</th>
                                            <th>St&uuml;ck</th>
                                            <th>Gesamtpreis</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                    $gesamtpreis = 0;

                    foreach ($bestellDetails as $bestellDetail) {
                        $produktID = $bestellDetail['pk_fk_product_id'];
                        $amount = $bestellDetail['amount'];
                        $products = $DB->Execute("SELECT * FROM products where pk_product_id=$produktID");
                        foreach ($products as $product) {
                            $productName = $product['description'];
                            echo '<tr><td>'.$product['description'].'</td>';
                            $preis = $product['price'];
                            echo '<td>'.$product['price'].'</td>';
                            echo '<td>'.$bestellDetail['amount'].'</td>';
                            echo '<td>';
                            $gesamtpreisprodukt = $preis*$amount;
                            $gesamtpreis += $gesamtpreisprodukt;
                            echo $gesamtpreisprodukt;
                            echo '</td></tr>';
                        }
                    }
                    echo '</tbody>
                            <tfoot>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td>Summe:</td>
                                  <td>'.$gesamtpreis.'</td>
                                </tr>
                            </tfoot>
                    </table>';
                ?>       
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
   
</body>
</html>