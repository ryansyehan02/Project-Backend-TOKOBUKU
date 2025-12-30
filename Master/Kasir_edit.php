<?php include('../Connections/koneksi.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE kasir SET nama=%s, alamat=%s, telepon=%s, status=%s, username=%s, password=%s, akses=%s WHERE id_kasir=%s",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['telepon'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['akses'], "text"),
                       GetSQLValueString($_POST['id_kasir'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "dtKasir.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rcUpdate = "-1";
if (isset($_POST['hdnEdit'])) {
  $colname_rcUpdate = (get_magic_quotes_gpc()) ? $_POST['hdnEdit'] : addslashes($_POST['hdnEdit']);
}
mysql_select_db($database_koneksi, $koneksi);
$query_rcUpdate = sprintf("SELECT * FROM kasir WHERE id_kasir = '%s'", $colname_rcUpdate);
$rcUpdate = mysql_query($query_rcUpdate, $koneksi) or die(mysql_error());
$row_rcUpdate = mysql_fetch_assoc($rcUpdate);
$totalRows_rcUpdate = mysql_num_rows($rcUpdate);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Data</title>
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
				<li><a href="indexMaster.php">Home</a></li>
				<li><a href="dtKasir.php">Data Kasir</a></li>
				<li class="active"><a href="#">Edit Data</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Kasir_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID Kasir :</td>
      <td class="form-control"><?php echo $row_rcUpdate['id_kasir']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Lengkap :</td>
      <td><input type="text" name="nama" value="<?php echo $row_rcUpdate['nama']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alamat Lengkap :</td>
      <td><input type="text" name="alamat" value="<?php echo $row_rcUpdate['alamat']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">No Telepon :</td>
      <td><input type="text" name="telepon" value="<?php echo $row_rcUpdate['telepon']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status :</td>
      <td><input type="text" name="status" value="<?php echo $row_rcUpdate['status']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Username :</td>
      <td><input type="text" name="username" value="<?php echo $row_rcUpdate['username']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password :</td>
      <td><input type="text" name="password" value="<?php echo $row_rcUpdate['password']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Akses :</td>
      <td><input type="text" name="akses" value="<?php echo $row_rcUpdate['akses']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="PROSES" class="btn btn-primary btn-block"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_kasir" value="<?php echo $row_rcUpdate['id_kasir']; ?>">
</form>
</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>
<?php
mysql_free_result($rcUpdate);
?>
