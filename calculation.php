<link href="/srijon/css/form.css" rel="stylesheet">
<?php
$lid = $_SESSION['lid'];
$selecteddate = $_SESSION['selecteddate'];
$query = mysql_fetch_assoc(mysql_query("select * from log l, station s, train_type tt, trains t where l.departure_sid=s.sid and tt.typeid=l.typeid and t.tid=tt.tid and l.lid=$lid"));
$fname = mysql_fetch_assoc(mysql_query("select * from station where sid=".$query['departure_sid']));
$sname = mysql_fetch_assoc(mysql_query("select * from station where sid=".$query['arrival_sid']));
$qr = mysql_fetch_assoc(mysql_query("select * from available_seats where date='".$selecteddate."' and lid=".$query['lid']));	
$seats='';



if(isset($qr['available']) && $qr['available']==0){
	 exit;
}
else if(!isset($qr['available'])){
	$seats = $query["seats"];
	
}
else{
	$seats=$qr['available'];
}
if(isset($_POST['apply'])){
	
	if($_POST['tseat'] > 0 && $_POST['tseat'] <6){
	
		
		
		if($seats >= $_POST['tseat']){
		$av=$seats-$_POST['tseat'];
		$query1=mysql_query("INSERT INTO `reservation` ( `customer_name`, `phon_no`, `date`, `number_of_seats`, `lid`, `cancelation_code`) VALUES ( '".$_POST['name']."', '".$_POST['phone']."', '".$selecteddate."', ".$_POST['tseat'].",".$query['lid'].", '".$_POST['phone']."".mt_rand(111,999)."".mt_rand(1111,9999)."')");
		
		
				if(mysql_affected_rows($con)==1){
			
						echo "<h1><font color='green'>Successfull!<br>Price: ".$query['price']*$_POST['tseat']." TK/=</h1></font><br>";
			
						if(isset($qr['available']) && $qr['available']!=0){
								mysql_query("UPDATE `available_seats` SET `available`=".$av." WHERE lid=".$lid." and `date`='".$selecteddate."'");
								
						}
						else{
							mysql_query("INSERT INTO `available_seats` (lid,`date`,`available`) values (".$lid.",'".$selecteddate."',".$query["seats"]."-".$_POST['tseat'].")");
							
						}
				}
				
		}
		else{
			echo '<script language="javascript"> alert("Not enough seat is availavle") </script>' ;
		}
		
		
	}
	else echo "enter valid seat numbers";	
}

echo '
	<div class="form-style-6"> 
		
		<form action="" method="post">
			<p>Name:</p><input type="text" name="name" placeholder="Full Name" required/>
			<p>Phone Number:</p><input type="text" name="phone" placeholder="Phone Number" required/>
			<p>No. Of Seats:</p> <input type="number" name="tseat" value="1" min="1" max="5"/>
			<p>Journey date:</p><input type="text" value="'.$selecteddate.'" disabled/>
			<p>Train:</p><input type="text" value="'.$query['tname'].'" disabled/>
			<p>From & To:</p><input type="text" value="'.$fname['sname'].' to '.$sname['sname'].'" disabled/>
			<p>Type:</p><input type="text" value="'.$query['type'].'" disabled/>
			<p>Departure Time:</p><input type="text" value="'.$query['departure_scheduled_time'].'" disabled/>
			<input type="submit" name="apply" value="Request for Booking seat"/>
		</form>
	</div>';



?>	
