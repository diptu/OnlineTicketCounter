<link href="/srijon/css/table_style.css" rel="stylesheet">
<body>
	<div class="container">
		<div class="row">
		
			<div class="col-sm-12">
				<div class="panel panel-success">
					<div class="panel-body text-center">
						<div class="row" style="margin-top: 5px;">
							<div class="col-sm-12">                  
								<form action="" method="post">
									<table id="t01">
										<tr>
											<th>From</th>
											<th>To</th>
											<th>Date of Journey</th>
											<th>Search & Reserve</th>
										</tr>
										<tr>
											<td>
												
												<select name="from">
													<?php $sql=mysql_query("select distinct * from station");
													while($r=mysql_fetch_assoc($sql)){ ?>
														<option value="<?=$r['sid']?>" <?php if(isset($_POST['from']) and $_POST['from']==$r['sid']) echo "selected";?>><?=$r['sname']?></option>
													<?php }?>
												</select>
											</td>
											<td>											
												<select name="to">
													<?php $sql=mysql_query("select distinct * from station");
													while($r=mysql_fetch_assoc($sql)){ ?>
														<option value="<?=$r['sid']?>" <?php if(isset($_POST['to']) and $_POST['to']==$r['sid']) echo "selected";?>><?=$r['sname']?></option>
													<?php }?>
												</select>
											</td>
											<td>
												<input type="date" name="jdate" value="" required/>
											</td>
											<td>
												<input class="btn btn-success green" type="submit" name="search" value="Search"/>
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				
				if(isset($_POST['search'])){
					$f = $_POST['from'];
					$t = $_POST['to'];
					$d = $_POST['jdate'];
					$da = explode('-', $d);
					
					if(isset($da[0]) && isset($da[2]) && isset($da[1]) &&is_numeric($da[0]) && is_numeric($da[1]) && is_numeric($da[2])){
					
						if($f==$t){
							echo '<script language="javascript"> alert("Source and destination should not same!") </script>' ;
						}
						if($d < date("Y-m-d")){
							echo '<script language="javascript"> alert("Date is unavailable!") </script>' ;
						}
						else{
							$_SESSION['f']=$f;
							$_SESSION['t']=$t;
							$_SESSION['d']=$d;
							$_SESSION['a']='in active';
							$_SESSION['b']='';
						}
						
					}
					else{
						echo '<script language="javascript"> alert("Date is invalid.") </script>' ;
					}
				
				}
				if(!isset($_POST['search']) && !isset($_POST['select']) && !isset($_POST['apply'])){
					
					$_SESSION['f']=null;
					$_SESSION['t']=null;
					$_SESSION['d']=null;
					$_SESSION['lid']=null;
					$_SESSION['selecteddate']=null;
					$_SESSION['a']=null;
					$_SESSION['b']=null;
				}
				if(isset($_SESSION['f'])){
					include("choose.php");
				}
				
				

			?>

		</div>
	</div>
</body>


