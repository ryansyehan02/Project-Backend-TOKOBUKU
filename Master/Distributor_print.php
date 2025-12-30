<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcDistributor = "SELECT * FROM distributor";
$rcDistributor = mysql_query($query_rcDistributor, $koneksi) or die(mysql_error());
$row_rcDistributor = mysql_fetch_assoc($rcDistributor);
$totalRows_rcDistributor = mysql_num_rows($rcDistributor);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Distributor</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h3 align="center" class="page-header">LAPORAN DISTRIBUTOR</h3>
<div class="container-fluid">
<script>window.print()</script>

<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="">
  <tr>
    <td height="34" align="center" valign="middle" nowrap="nowrap" class="headPrint">ID Distributor </span></td>
    <td align="center" valign="middle" nowrap="nowrap" class="headPrint">Nama Distributor </td>
    <td align="center" valign="middle" nowrap="nowrap" class="headPrint">Alamat Lengkap </td>
    <td align="center" valign="middle" nowrap="nowrap" class="headPrint">No Telepon </td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center" valign="middle"><?php echo $row_rcDistributor['id_distributor']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcDistributor['nama_distributor']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcDistributor['alamat']; ?></td>
      <td align="center" valign="middle"><?php echo $row_rcDistributor['telepon']; ?></td>
    </tr>
    <?php } while ($row_rcDistributor = mysql_fetch_assoc($rcDistributor)); ?>
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
mysql_free_result($rcDistributor);
?>
