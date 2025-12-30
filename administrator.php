<?php include('Connections/koneksi.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUser'])) {
  $loginUsername=$_POST['txtUser'];
  $password=$_POST['txtPass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "/www.tokobuku.com/Master/indexMaster.php";
  $MM_redirectLoginFailed = "/www.tokobuku.com/administrator.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_koneksi, $koneksi);
  
  $LoginRS__query=sprintf("SELECT username, password FROM kasir WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<nav class="navbar navbar-default">
    	<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">TOKO BUKU BERSAMA</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('tanggal.php'); ?></a></li>
				<li class="active"><a href="administrator.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
			</ul>
   </div>
</nav>
	<div class="container-fluid">
		<br />
		<br />
		<br />
		<br />
		<h3 align="center"><u>Silahkan Login Untuk Melanjutkan</u></h3>
		
		<br />
		<form action="<?php echo $loginFormAction; ?>" method="POST" name="frmLogin">
		  <table width="30%" border="0" align="center" cellpadding="1" cellspacing="0">
            <tr>
              <th scope="col"><span class="glyphicon glyphicon-user"></span></th>
              <th scope="col"><input name="txtUser" type="text" id="txtUser" class="form-control" placeholder="Username"/></th>
            </tr>
            <tr>
              <th scope="row"><span class="glyphicon glyphicon-lock"></span></th>
              <td><input name="txtPass" type="password" id="txtPass" class="form-control" placeholder="Password" /></td>
            </tr>
            <tr>
              <th scope="row">&nbsp;</th>
              <td><input name="btn Login" type="submit" id="btn Login" value="Login" class="btn btn-primary btn-block" /></td>
            </tr>
          </table>
	  </form>
	</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>