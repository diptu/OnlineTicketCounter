<?php
session_start();
include 'head2.php';
if(isset($_SESSION['uid'])){
?>
<link href="/srijon/css/form.css" rel="stylesheet">
	
	
<?php
	if(isset($_GET['pid']) && $_GET['pid'] != null){
		
		$notice=mysql_query("DELETE FROM `notice` WHERE post_id=".$_GET['pid']." AND uid=".$_SESSION['uid']);
		if(mysql_affected_rows($con)==1){
			header('Location:index.php?n=Delete successfully!');
		}
		else{
			header('Location:index.php?n=Delete failed!');
		}
		
	}
	else if(isset($_GET['editpid']) && $_GET['editpid'] != null){
		$txt=mysql_fetch_assoc(mysql_query("SELECT  * FROM notice where post_id=".$_GET['editpid']." and uid=".$_SESSION['uid']));
		$uname=mysql_fetch_assoc(mysql_query("SELECT  * FROM person where uid=".$_SESSION['uid']));
		if(isset($txt['post_id'])){
			echo '<div class="form-style-6">
					<label>'.$uname["name"].'<br><a href="logout.php">LogOut</a></label>
					<form action="" method="post">
						<textarea rows="8" name="message" placeholder="">'.$txt['post_text'].'</textarea>
						<input class="btn btn-success green" type="submit" name="updateMessage" value="Upadate"/>
					</form>

				</div>';
		


			if(isset($_POST['updateMessage'])){
				$m=$_POST['message'];
				
				$mess=mysql_query("update notice set post_text='".$m."' where post_id=".$_GET['editpid']." and uid=".$_SESSION['uid']);
				if(mysql_affected_rows($con)==1){
					header('Location:index.php?n=Update successfully!');
				}
				else{
					header('Location:index.php?n=Update failed!');
				}
			}
		}
		else{
			echo '<div class="form-style-6">
					<label>'.$uname["name"].'<br><a href="logout.php">LogOut</a></label>
					<form action="" method="post">
						NOT FOUND!
					</form>

				</div>';
		}
	
	}
	else{
		header('Location:/srijon/admin');
	}
}
else
{
	header('Location:/srijon/admin');
}
include 'footer.php';
?>