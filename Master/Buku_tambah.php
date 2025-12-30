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
  $insertSQL = sprintf("INSERT INTO buku (id_buku, judul, noisbn, penulis, penerbit, tahun, stok, harga_pokok, harga_jual, ppn, diskon) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_buku'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['noisbn'], "text"),
                       GetSQLValueString($_POST['penulis'], "text"),
                       GetSQLValueString($_POST['penerbit'], "text"),
                       GetSQLValueString($_POST['tahun'], "text"),
                       GetSQLValueString($_POST['stok'], "int"),
                       GetSQLValueString($_POST['harga_pokok'], "int"),
                       GetSQLValueString($_POST['harga_jual'], "int"),
                       GetSQLValueString($_POST['ppn'], "int"),
                       GetSQLValueString($_POST['diskon'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "dtBuku.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_rcPasok = "SELECT id_buku FROM pasok";
$rcPasok = mysql_query($query_rcPasok, $koneksi) or die(mysql_error());
$row_rcPasok = mysql_fetch_assoc($rcPasok);
$totalRows_rcPasok = mysql_num_rows($rcPasok);
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
				<li><a href="dtBuku.php">Data Buku</a></li>
				<li class="active"><a href="#">Tambah Data</a></li>
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
      <td nowrap align="right">Id_buku:</td>
      <td><select name="id_buku" class="form-control">
        <?php 
do {  
?>
        <option value="<?php echo $row_rcPasok['id_buku']?>" ><?php echo $row_rcPasok['id_buku']?></option>
        <?php
} while ($row_rcPasok = mysql_fetch_assoc($rcPasok));
?>
      </select>
      </td>
    <tr>
    <tr valign="baseline">
      <td nowrap align="right">Judul:</td>
      <td><input type="text" name="judul" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Noisbn:</td>
      <td><input type="text" name="noisbn" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Penulis:</td>
      <td><input type="text" name="penulis" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Penerbit:</td>
      <td><input type="text" name="penerbit" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tahun:</td>
      <td><input type="text" name="tahun" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Stok:</td>
      <td><input type="text" name="stok" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Harga_pokok:</td>
      <td><input type="text" name="harga_pokok" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Harga_jual:</td>
      <td><input type="text" name="harga_jual" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ppn:</td>
      <td><input type="text" name="ppn" value="" size="32" class="form-control"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Diskon:</td>
      <td><input type="text" name="diskon" value="" size="32" class="form-control"></td>
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
mysql_free_result($rcPasok);
?>
