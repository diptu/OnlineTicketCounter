<?php if(isset($_SESSION['uid'])){?>

<style type="text/css">
.form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 800px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
</style>

<?php
	$ui=$_SESSION['uid'];
	$un=$_SESSION['usn'];
	$msg = '';
			
	$admin1=mysql_query("SELECT  name FROM person WHERE uid=$ui");
	$ares=mysql_fetch_assoc($admin1);
	if(isset($_POST['submitMessage'])){
		$m=$_POST['message'];
		
		$mess=mysql_query("INSERT INTO `notice`(`date`, `post_text`, `uid`) VALUES (NOW(),'$m',$ui)");
		if(mysql_affected_rows($con)==1){
			$msg = '<br>Notice has been posted';
		}
		else{
			echo mysql_error();
		}
	}
	
	echo '<div class="form-style-6">
			
			<label>Wellcom '.$ares["name"].'<br><a href="logout.php">LogOut</a><font color="green"><b>'.$msg.'</b></font></label>
			<form action="" method="post">
				<textarea rows="8" name="message" placeholder="" ></textarea>
				<input class="btn btn-success green" type="submit" name="submitMessage" value="Post"/>
			</form>

		</div>';
	
	

	

}
else{?>


<style>
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

body {
  background: #ffffff; 
   
}
</style>
<?php
	
	$err='';
	if(isset($_POST['go'])){
		$n = $_POST['uname'];
		$p = $_POST['psw'];
		
		$checkPass=mysql_query("select * from `admin` where username='$n' and password='$p'");
	
		if(mysql_num_rows($checkPass) == 1){
			while($res=mysql_fetch_assoc($checkPass)){
				$_SESSION['uid']=$res["uid"];
				$_SESSION['usn']=$res["username"];
			}
			header('Location:admin');
		}
		else{
			$err = 'Incorrect Unsername Or Password.';
		}
	}
	echo '
	<div class="login-page">
	  <div class="form">
		<font color="red">'.$err.'</font>
		<form class="login-form" action="" method="post">
		  <input type="text" name="uname" placeholder="username"/>
		  <input type="password" name="psw" placeholder="password"/>
		  <button type="submit" name="go">Login</button>
		  
		</form>
	  </div>
	</div> ';

}
?>
