 <?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
$colname_rcCari = "-1";
if (isset($_GET['id_penjualan'])) {
  $colname_rcCari = (get_magic_quotes_gpc()) ? $_GET['id_penjualan'] : addslashes($_GET['id_penjualan']);
}
mysql_select_db($database_koneksi, $koneksi);
$query_rcCari = sprintf("SELECT * FROM penjualan WHERE id_penjualan LIKE '%%%s%%'", $colname_rcCari);
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
				<li><a href="dtPenjualan.php">Data Penjualan</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li class="active"><a href="Penjualan_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
<form id="frmCari" name="frmCari" method="get" action="Penjualan_cari.php">
  <input name="id_penjualan" type="text" id="id_penjualan" class="form-control-static" placeholder="ID Penjualan"/>
  <button name="Input" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Search</button>
  <p>&nbsp;</p>

  <?php if ($totalRows_rcCari > 0) { // Show if recordset not empty ?>
    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive">
      <tr>
        <td bgcolor="#a4c2c2">ID Penjualan </td>
        <td bgcolor="#a4c2c2">ID Buku </td>
        <td bgcolor="#a4c2c2">ID Kasir </td>
        <td bgcolor="#a4c2c2">Jumlah</td>
        <td bgcolor="#a4c2c2">Total</td>
        <td bgcolor="#a4c2c2">Tanggal</td>
      </tr>
      <?php do { ?>
        <tr>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_penjualan']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_buku']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['id_kasir']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['jumlah']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['total']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcCari['tanggal']; ?></td>
        </tr>
        <?php } while ($row_rcCari = mysql_fetch_assoc($rcCari)); ?>
      </table>
    <?php } // Show if recordset not empty ?>
	</form>
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
