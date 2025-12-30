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
  $updateSQL = sprintf("UPDATE buku SET judul=%s, noisbn=%s, penulis=%s, penerbit=%s, tahun=%s, stok=%s, harga_pokok=%s, harga_jual=%s, ppn=%s, diskon=%s WHERE id_buku=%s",
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['noisbn'], "text"),
                       GetSQLValueString($_POST['penulis'], "text"),
                       GetSQLValueString($_POST['penerbit'], "text"),
                       GetSQLValueString($_POST['tahun'], "text"),
                       GetSQLValueString($_POST['stok'], "int"),
                       GetSQLValueString($_POST['harga_pokok'], "int"),
                       GetSQLValueString($_POST['harga_jual'], "int"),
                       GetSQLValueString($_POST['ppn'], "int"),
                       GetSQLValueString($_POST['diskon'], "text"),
                       GetSQLValueString($_POST['id_buku'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "dtBuku.php";
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
$query_rcUpdate = sprintf("SELECT * FROM buku WHERE id_buku = '%s'", $colname_rcUpdate);
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
				<li><a href="dtBuku.php">Data Buku</a></li>
				<li class="active"><a href="#">Edit Data</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Buku_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   		</div>
</nav>
<br />
<div class="container-fluid">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID Buku :</td>
      <td class="form-control"><?php echo $row_rcUpdate['id_buku']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Judul :</td>
      <td><input type="text" name="judul" value="<?php echo $row_rcUpdate['judul']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NO ISBN :</td>
      <td><input type="text" name="noisbn" value="<?php echo $row_rcUpdate['noisbn']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Penulis :</td>
      <td><input type="text" name="penulis" value="<?php echo $row_rcUpdate['penulis']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Penerbit :</td>
      <td><input type="text" name="penerbit" value="<?php echo $row_rcUpdate['penerbit']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tahun :</td>
      <td><input type="text" name="tahun" value="<?php echo $row_rcUpdate['tahun']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Stok :</td>
      <td><input type="text" name="stok" value="<?php echo $row_rcUpdate['stok']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Harga Pokok :</td>
      <td><input type="text" name="harga_pokok" value="<?php echo $row_rcUpdate['harga_pokok']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Harga Jual :</td>
      <td><input type="text" name="harga_jual" value="<?php echo $row_rcUpdate['harga_jual']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">PPN :</td>
      <td><input type="text" name="ppn" value="<?php echo $row_rcUpdate['ppn']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Diskon :</td>
      <td><input type="text" name="diskon" value="<?php echo $row_rcUpdate['diskon']; ?>" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="PROSES" class="btn btn-primary btn-block"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_buku" value="<?php echo $row_rcUpdate['id_buku']; ?>">
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
