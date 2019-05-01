<?php
include 'dbconfig.php';
?>

<!DOCTYPE html>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Railway Management System</title>
    <link href="/srijon/css/bootstrap.min.css" rel="stylesheet">
    <link href="/srijon/css/logo-nav.css" rel="stylesheet">
    <script src="/srijon/js/jquery.js"></script>
    <script src="/srijon/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/srijon">
                    <img src="/srijon/images/logo.png" width="216" height="112" alt="Railway Management System">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <p> </p>

                    </li>
			
					<li>
                        <p> </p>

                    </li>
                   
					<li id="m1">
						<a  href="#" data-toggle="dropdown"> ABOUT<span class="caret"></span></a>

						<ul class="dropdown-menu">

							<li><a href="/srijon/About/history_about_bangladesh.php">History</a></li>
							<li><a href="/srijon/About/vision.php">Future Project</a></li>
							<li><a href="/srijon/About/Bangladesh_Map.pdf">Railway route map</a></li>
						</ul>
					</li>
					
					<li id="m1">
						<a href="/srijon/admin" >Administration</a>

					</li>

					<li id="m1">
						<a href="/srijon/train_departure_schedule">Trains departure Schedule</a>

					</li>

					<li id="m1">
						<a href="/srijon/reservation">Online reservation</a>

					</li>
                </ul>
            </div>
            
        </div>
        
    </nav>