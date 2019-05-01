<?php
	session_start();
	include 'head2.php';
	
	if(isset($_GET['go'])){
		if($_GET['go']=='home'){
			include('home.php');
		}
		else if($_GET['go']=='admin'){
			include('admin.php');
		}
		else if($_GET['go']=='train_departure_schedule'){
			include('train_departure_schedule.php');
		}
		else if($_GET['go']=='reservation'){
			include('reservation.php');
		}
		else{
			include('home.php');
		}
	}
	else{
		include('home.php');
	}
	include 'footer.php';
?>


