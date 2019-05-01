<link href="/srijon/css/table_style.css" rel="stylesheet">

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-success">
					<div class="panel-body text-center">
						<div class="row" style="margin-top: 5px;">
							<div class="col-sm-12"> 
								<table id="t01">
									<tr>
										<th>Destination</th>
										<th>Train Name</th> 
										<th>Time Schedule</th>
										<th>Type</th>
										<th>Price</th>
									</tr>
								 
									
									<?php
										$departure_schedule=mysql_query("SELECT *, concat(S1.sname,' to ',S2.sname) as Destination ,T.tname as 'Train Name',L.departure_scheduled_time as 'departure time' FROM `trains` T,`station` S1,`station` S2, `log` L, train_type tt WHERE tt.typeid=L.typeid and T.tid=tt.tid and S1.sid=L.departure_sid and S2.sid=L.arrival_sid;");
										while($res=mysql_fetch_assoc($departure_schedule)){
											echo '<tr>	
													<td>'.$res["Destination"].'</td>
													<td>'.$res["Train Name"].'</td>
													<td>'.$res["departure time"].'</td>
													<td>'.$res["type"].'</td>
													<td>'.$res["price"].'</td>
												</tr>';

										}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

