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
  $insertSQL = sprintf("INSERT INTO pasok (id_pasok, id_distributor, id_buku, jumlah, tanggal) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_pasok'], "text"),
                       GetSQLValueString($_POST['id_distributor'], "text"),
                       GetSQLValueString($_POST['id_buku'], "text"),
                       GetSQLValueString($_POST['jumlah'], "int"),
                       GetSQLValueString($_POST['tanggal'], "date"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "dtPasok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_rcDistributor = "SELECT id_distributor FROM distributor";
$rcDistributor = mysql_query($query_rcDistributor, $koneksi) or die(mysql_error());
$row_rcDistributor = mysql_fetch_assoc($rcDistributor);
$totalRows_rcDistributor = mysql_num_rows($rcDistributor);

$d=date('Y-m-d');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
				<li><a href="dtPasok.php">Data Pasok</a></li>
				<li class="active"><a href="#">Tambah Data</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Pasokr_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID Pasok :</td>
      <td><input type="text" name="id_pasok" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">ID Distributor :</td>
      <td><select name="id_distributor" class="form-control">
        <?php 
do {  
?>
        <option value="<?php echo $row_rcDistributor['id_distributor']?>" ><?php echo $row_rcDistributor['id_distributor']?></option>
        <?php
} while ($row_rcDistributor = mysql_fetch_assoc($rcDistributor));
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">ID Buku :</td>
      <td><input type="text" name="id_buku" value="" size="32" class="form-control" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jumlah :</td>
      <td><input type="text" name="jumlah" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal :</td>
      <td><input type="text" name="tanggal" size="32" class="form-control" value="<?php echo $d; ?>" readonly="" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="PROSES" class="btn btn-primary btn-block"></td>
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
<?php
mysql_free_result($rcDistributor);
?>
