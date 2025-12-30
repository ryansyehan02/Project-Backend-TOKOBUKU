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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO distributor (id_distributor, nama_distributor, alamat, telepon) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_distributor'], "text"),
                       GetSQLValueString($_POST['nama_distributor'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['telepon'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "dtDistributor.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Data</title>
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
				<li><a href="dtDistributor.php">Data Distributor</a></li>
				<li class="active"><a href="#">Tambah Data</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Distributor_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center" class="table-hover">
    <tr valign="baseline">
      <td nowrap align="right">ID Distributor :</td>
      <td><input type="text" name="id_distributor" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Distributor :</td>
      <td><input type="text" name="nama_distributor" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alamat Lengkap :</td>
      <td><input type="text" name="alamat" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">No. Telepon:</td>
      <td><input type="text" name="telepon" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="PROSES" class="btn btn-block btn-primary"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>
