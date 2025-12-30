<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcKasir = "SELECT * FROM kasir";
$rcKasir = mysql_query($query_rcKasir, $koneksi) or die(mysql_error());
$row_rcKasir = mysql_fetch_assoc($rcKasir);
$totalRows_rcKasir = mysql_num_rows($rcKasir);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Kasir</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h3 align="center" class="page-header">LAPORAN KASIR</h3>
<div class="container-fluid">
<script>window.print()</script>

<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td height="33" align="center" valign="middle" class="headPrint">id kasir</td>
    <td align="center" valign="middle" class="headPrint">nama</td>
    <td align="center" valign="middle" class="headPrint">alamat</td>
    <td align="center" valign="middle" class="headPrint">telepon</td>
    <td align="center" valign="middle" class="headPrint">status</td>
    <td align="center" valign="middle" class="headPrint">username</td>
    <td align="center" valign="middle" class="headPrint">password</td>
    <td align="center" valign="middle" class="headPrint">akses</td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_rcKasir['id_kasir']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['nama']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['alamat']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['telepon']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['status']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['username']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['password']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcKasir['akses']; ?></td>
    </tr>
    <?php } while ($row_rcKasir = mysql_fetch_assoc($rcKasir)); ?>
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
mysql_free_result($rcKasir);
?>
