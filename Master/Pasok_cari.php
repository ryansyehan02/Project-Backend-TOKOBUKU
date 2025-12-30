<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
$colname_rcCari = "-1";
if (isset($_GET['id_pasok'])) {
  $colname_rcCari = (get_magic_quotes_gpc()) ? $_GET['id_pasok'] : addslashes($_GET['id_pasok']);
}
mysql_select_db($database_koneksi, $koneksi);
$query_rcCari = sprintf("SELECT * FROM pasok WHERE id_pasok LIKE '%%%s%%'", $colname_rcCari);
$rcCari = mysql_query($query_rcCari, $koneksi) or die(mysql_error());
$row_rcCari = mysql_fetch_assoc($rcCari);
$totalRows_rcCari = mysql_num_rows($rcCari);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cari Data</title>
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
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li class="active"><a href="Pasok_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
<form action="/www.tokobuku.com/Master/Pasok_cari.php" method="get">
  <input name="id_pasok" type="text" class="form-control-static" placeholder="ID Pasok"/>
  <button name="Input" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Search</button>
  <?php if ($totalRows_rcCari > 0) { // Show if recordset not empty ?>
    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive">
        <tr>
          <td align="center" valign="middle" bgcolor="#a4c2c2">ID Pasok </td>
          <td align="center" valign="middle" bgcolor="#a4c2c2">ID Distributor </td>
          <td align="center" valign="middle" bgcolor="#a4c2c2">ID Buku </td>
          <td align="center" valign="middle" bgcolor="#a4c2c2">Jumlah</td>
          <td align="center" valign="middle" bgcolor="#a4c2c2">Tanggal</td>
        </tr>
        <?php do { ?>
          <tr>
            <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_pasok']; ?></td>
            <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_distributor']; ?></td>
            <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_buku']; ?></td>
            <td bgcolor="#CCCCCC"><?php echo $row_rcCari['jumlah']; ?></td>
            <td bgcolor="#CCCCCC"><?php echo $row_rcCari['tanggal']; ?></td>
          </tr>
          <?php } while ($row_rcCari = mysql_fetch_assoc($rcCari)); ?>
      </table>
    <?php } // Show if recordset not empty ?></form>
</div>
<br />
<br />
<br />

	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>
<?php
mysql_free_result($rcCari);
?>
