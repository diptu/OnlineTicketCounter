<script>
	function dlt (pid) {
		if(confirm("Sure to delete?")==true){
			window.location="deletenotice.php?pid="+pid;
		}
		return false;
	 }
	 function edt (pid) {
		
		window.location="deletenotice.php?editpid="+pid;
		
		
	 }
</script>
<?php

	$notice=mysql_query("SELECT  * FROM notice n, person p where n.uid=p.uid order by n.date desc");
	while($r=mysql_fetch_assoc($notice)){
		print_r('<pre>');
		echo "<br><h1><font color='red'><marquee>".$r['post_text']."</marquee></font></h1><small><br><font color='grey'>By: ".$r['name']."<br>Time: ".$r['date']."</font></small>";
		if(isset($_SESSION['uid']) && $_SESSION['uid'] ==  $r['uid']) {
			echo ' <input type="button" onclick="edt('.$r['post_id'].')" value="E"/><input type="button" onclick="dlt('.$r['post_id'].')" value="X"/>';
			
		}
		print_r('</pre>');
		
	}

	if(isset($_GET['n'])){
		echo '<script language="javascript"> alert("'.$_GET['n'].'") </script>' ; 
	}
	
?>