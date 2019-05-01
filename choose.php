<?php
$f = $_SESSION['f'];
$t = $_SESSION['t'];
$d = $_SESSION['d'];
$query = mysql_query("select * from log l, station s, train_type tt, trains t where l.departure_sid=s.sid and tt.typeid=l.typeid and t.tid=tt.tid and l.departure_sid=$f and l.arrival_sid=$t");
$fname = mysql_fetch_assoc(mysql_query("select * from station where sid=$f"));
$sname = mysql_fetch_assoc(mysql_query("select * from station where sid=$t"));	

if(isset($_POST['select'])){
	
	$_SESSION['b']='in active';
	$_SESSION['a']='';
	$_SESSION['lid'] = $_POST['lid'];
	$_SESSION['selecteddate'] = $_POST['selecteddate'];
	
}

?>
	
<div class="col-sm-12">
	<div class="panel panel-success">
		<div class="panel-body text-center">
			<div class="row" style="margin-top: 5px;">
				<div class="col-sm-12">
				<?php if(isset($_SESSION['b']) && $_SESSION['b']=='in active'){?>
					<ul class="nav nav-tabs padding-18">
						<li >
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i> Back
							</a>
						</li>
						<li class="active">
							<a data-toggle="tab" href="#personal">
								<i class="blue ace-icon fa fa-users bigger-120"></i> Reserve Seat
							</a>
						</li>
					</ul>
				<?php } ?>
					<div class="tab-content no-border padding-24">
						<div id="home" class="tab-pane <?=$_SESSION['a']?>">
							<table id="t01">
								<tr>
									<th>Destination</th>
									<th>Train Name</th> 
									<th>Time Schedule</th>
									<th>Type</th>
									<th>Price</th>
									<th>Seat available</th>
									<th></th>
								</tr>
								<?php
									while($res=mysql_fetch_assoc($query)){
										$qr = mysql_fetch_assoc(mysql_query("select * from available_seats where date='".$d."' and lid=".$res['lid']));
										$seats='';
										if(isset($qr['available']) && $qr['available']==0){
											 continue;
										}
										else if(!isset($qr['available'])){
											$seats = $res["seats"];
											
										}
										else{
											$seats=$qr['available'];
										}
										
										echo '
											<form action="" method="post">
												<input style="visibility:hidden" name="lid" value="'.$res["lid"].'"/>
												<input style="visibility:hidden" name="selecteddate" value="'.$d.'"/>
												<tr>	
													<td>'.$fname["sname"].' - '.$sname["sname"].'</td>
													<td>'.$res["tname"].'</td>
													<td>'.$res["departure_scheduled_time"].'</td>
													<td>'.$res["type"].'</td>
													<td>'.$res["price"].'</td>
													<td>'.$seats.'</td>
													<td>
														<input type="submit" name="select" value="Select"/>
													</td>
												</tr>
											</form>';
									}
								?>
								
							</table>
						</div>
						
						<div id="personal" class="tab-pane <?=$_SESSION['b']?>">

							<?php include("calculation.php"); ?>
						   
						</div>
					
					</div>
					
					
					
					
				</div>
			</div>
		</div>
	</div>
</div>
	