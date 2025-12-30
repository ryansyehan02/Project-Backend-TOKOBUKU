<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcPenjualan = "SELECT * FROM penjualan";
$rcPenjualan = mysql_query($query_rcPenjualan, $koneksi) or die(mysql_error());
$row_rcPenjualan = mysql_fetch_assoc($rcPenjualan);
$totalRows_rcPenjualan = mysql_num_rows($rcPenjualan);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Penjualan</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h3 align="center" class="page-header">LAPORAN PENJUALAN</h3>
<div class="container-fluid">
<script>window.print()</script>

<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td height="36" align="center" valign="middle" class="headPrint">id penjualan</td>
    <td align="center" valign="middle" class="headPrint">id buku</td>
    <td align="center" valign="middle" class="headPrint">id kasir</td>
    <td align="center" valign="middle" class="headPrint">jumlah</td>
    <td align="center" valign="middle" class="headPrint">total</td>
    <td align="center" valign="middle" class="headPrint">tanggal</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_rcPenjualan['id_penjualan']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcPenjualan['id_buku']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcPenjualan['id_kasir']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcPenjualan['jumlah']; ?></td>
      <td align="center" valign="middle">Rp.<?php echo $row_rcPenjualan['total']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcPenjualan['tanggal']; ?></td>
    </tr>
    <?php } while ($row_rcPenjualan = mysql_fetch_assoc($rcPenjualan)); ?>
</table>
</div>
<br />

<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <th width="25%" scope="col">&nbsp;</th>
    <th width="25%" scope="col">&nbsp;</th>
    <th width="20%" scope="col">&nbsp;</th>
    <th width="30%" align="center" valign="middle" scope="col">
	<center>
		Medan, <?php $d=date('d M Y'); echo $d; ?>
		<br />
        Pemilik
		<br />
		<br />
		<br />
		<br />
		<br />
		Ryan Syehan Pratama
	</center>
	</th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rcPenjualan);
?>
