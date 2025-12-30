<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcBuku = "SELECT * FROM buku";
$rcBuku = mysql_query($query_rcBuku, $koneksi) or die(mysql_error());
$row_rcBuku = mysql_fetch_assoc($rcBuku);
$totalRows_rcBuku = mysql_num_rows($rcBuku);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Buku</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h3 align="center" class="page-header">LAPORAN BUKU</h3>
<div class="container-fluid">
<script>window.print()</script>

<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td height="38" align="center" valign="middle" class="headPrint">id buku</td>
    <td align="center" valign="middle" class="headPrint">judul</td>
    <td align="center" valign="middle" class="headPrint">noisbn</td>
    <td align="center" valign="middle" class="headPrint">penulis</td>
    <td align="center" valign="middle" class="headPrint">penerbit</td>
    <td align="center" valign="middle" class="headPrint">tahun</td>
    <td align="center" valign="middle" class="headPrint">stok</td>
    <td align="center" valign="middle" class="headPrint">harga pokok</td>
    <td align="center" valign="middle" class="headPrint">harga jual</td>
    <td align="center" valign="middle" class="headPrint">ppn</td>
    <td align="center" valign="middle" class="headPrint">diskon</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_rcBuku['id_buku']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['judul']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['noisbn']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['penulis']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['penerbit']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['tahun']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['stok']; ?></td>
      <td align="center" valign="middle">Rp.<?php echo $row_rcBuku['harga_pokok']; ?></td>
      <td align="center" valign="middle">Rp.<?php echo $row_rcBuku['harga_jual']; ?></td>
      <td align="center" valign="middle">Rp.<?php echo $row_rcBuku['ppn']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcBuku['diskon']; ?>%</td>
    </tr>
    <?php } while ($row_rcBuku = mysql_fetch_assoc($rcBuku)); ?>
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
mysql_free_result($rcBuku);
?>
