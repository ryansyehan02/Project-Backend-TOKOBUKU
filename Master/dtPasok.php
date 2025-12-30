<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcPasok = "SELECT * FROM pasok";
$rcPasok = mysql_query($query_rcPasok, $koneksi) or die(mysql_error());
$row_rcPasok = mysql_fetch_assoc($rcPasok);
$totalRows_rcPasok = mysql_num_rows($rcPasok);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Pasok</title>
<link href="/www.tokobuku.com/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="/www.tokobuku.com/assets/jquery.js"></script>
<link href="/www.tokobuku.com/assets/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<nav class="navbar navbar-default" id="header">
    	<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">TOKO BUKU BERSAMA</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="indexMaster.php">Home</a></li>
				<li><a href="dtDistributor.php">Data Distributor</a></li>
				<li class="active"><a href="dtPasok.php">Data Pasok</a></li>
				<li><a href="dtBuku.php">Data Buku</a></li>
				<li><a href="dtPenjualan.php">Data Penjualan</a></li>
				<li><a href="dtKasir.php">Data Kasir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Pasok_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<br />
	<br />
	<br />
	<br />
<div class="container-fluid">
	<a href="Pasok_tambah.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
	<a href="Pasok_print.php" class="btn btn-danger"><span class="glyphicon glyphicon-print"></span>Cetak</a>
	<br />
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive">
  <tr>
    <td width="15%" align="center" valign="middle" bgcolor="#a4c2c2">ID Pasok </td>
    <td width="18%" align="center" valign="middle" bgcolor="#a4c2c2">ID Distributor </td>
    <td width="14%" align="center" valign="middle" bgcolor="#a4c2c2">ID Buku </td>
    <td width="13%" align="center" valign="middle" bgcolor="#a4c2c2">Jumlah</td>
    <td width="24%" align="center" valign="middle" bgcolor="#a4c2c2">Tanggal</td>
    <td colspan="2" align="center" valign="middle" bgcolor="#a4c2c2">Fungsi</td>
    </tr>
  <?php do { ?>
    <tr>
      <td bgcolor="#CCCCCC"><?php echo $row_rcPasok['id_pasok']; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $row_rcPasok['id_distributor']; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $row_rcPasok['id_buku']; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $row_rcPasok['jumlah']; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $row_rcPasok['tanggal']; ?></td>
      <td width="7%" bgcolor="#CCCCCC"><form id="frmEdit" name="frmEdit" method="post" action="/www.tokobuku.com/Master/Pasok_edit.php">
        <input name="hdnEdit" type="hidden" id="hdnEdit" value="<?php echo $row_rcPasok['id_pasok']; ?>" />
		<button type="submit" id="btnEdit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Edit</button>
      </form>
      </td>
      <td width="9%" bgcolor="#CCCCCC"><form id="frmHapus" name="frmHapus" method="post" action="/www.tokobuku.com/Master/Pasok_hapus.php">
        <input name="hdnHapus" type="hidden" id="hdnHapus" value="<?php echo $row_rcPasok['id_pasok']; ?>" />
		<button type="submit" id="btnHapus" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span>Hapus</button>
      </form>
      </td>
    </tr>
    <?php } while ($row_rcPasok = mysql_fetch_assoc($rcPasok)); ?>
</table>
</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
	<BR />
	<BR />
	<BR />
</body>
</html>
<?php
mysql_free_result($rcPasok);
?>
