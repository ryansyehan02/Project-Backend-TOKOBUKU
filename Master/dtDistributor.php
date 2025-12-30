<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcDistributor = "SELECT * FROM distributor";
$rcDistributor = mysql_query($query_rcDistributor, $koneksi) or die(mysql_error());
$row_rcDistributor = mysql_fetch_assoc($rcDistributor);
$totalRows_rcDistributor = mysql_num_rows($rcDistributor);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Distributor</title>
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
				<li class="active"><a href="dtDistributor.php">Data Distributor</a></li>
				<li><a href="dtPasok.php">Data Pasok</a></li>
				<li><a href="dtBuku.php">Data Buku</a></li>
				<li><a href="dtPenjualan.php">Data Penjualan</a></li>
				<li><a href="dtKasir.php">Data Kasir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Distributor_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   		</div>
	</nav>
	<br />
	<br />
	<br />
	<br />
	<div class="container-fluid">
	<a href="Distributor_tambah.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
	<a href="Distributor_print.php" class="btn btn-danger"><span class="glyphicon glyphicon-print"></span>Cetak</a>
	<br />
    <table width="90%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive table-hover">
      <tr>
        <td width="16%" align="center" valign="middle" bgcolor="#a4c2c2">ID Distributor </td>
        <td width="19%" align="center" valign="middle" bgcolor="#a4c2c2">Nama Distributor </td>
        <td width="29%" align="center" valign="middle" bgcolor="#a4c2c2">Alamat Lengkap </td>
        <td width="22%" align="center" valign="middle" bgcolor="#a4c2c2">No Telepon</td>
        <td colspan="2" align="center" valign="middle" bgcolor="#a4c2c2">Fungsi</td>
      </tr>
      <?php do { ?>
      <tr>
        <td height="40" bgcolor="#CCCCCC"><?php echo $row_rcDistributor['id_distributor']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcDistributor['nama_distributor']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcDistributor['alamat']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcDistributor['telepon']; ?></td>
        <td width="6%" bgcolor="#CCCCCC"><form id="frmEdit" name="frmEdit" method="post" action="/www.tokobuku.com/Master/Distributor_edit.php">
            <input name="hdnEdit" type="hidden" id="hdnEdit" value="<?php echo $row_rcDistributor['id_distributor']; ?>" />
            <button type="submit" id="btnEdit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Edit</button>
        </form></td>
        <td width="8%" bgcolor="#CCCCCC">
		<form id="frmHapus" name="frmHapus" method="post" action="/www.tokobuku.com/Master/Distributor_hapus.php">
            <input name="hdnHapus" type="hidden" id="hdnHapus" value="<?php echo $row_rcDistributor['id_distributor']; ?>" />
            <button type="submit" id="btnHapus" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span>Hapus</button>
        </form></td>
      </tr>
      <?php } while ($row_rcDistributor = mysql_fetch_assoc($rcDistributor)); ?>
    </table>
</div>
<br />
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
mysql_free_result($rcDistributor);
?>
