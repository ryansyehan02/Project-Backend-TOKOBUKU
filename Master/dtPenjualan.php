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
<title>Data Penjualan</title>
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
				<li><a href="dtPasok.php">Data Pasok</a></li>
				<li><a href="dtBuku.php">Data Buku</a></li>
				<li class="active"><a href="dtPenjualan.php">Data Penjualan</a></li>
				<li><a href="dtKasir.php">Data Kasir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Penjualan_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<br />
	<br />
	<br />
	<br />
<div class="container-fluid">
	<a href="Penjualan_tambah.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
	<a href="Penjualan_print.php" class="btn btn-danger"><span class="glyphicon glyphicon-print"></span>Cetak</a>
	<br />
    <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive">
      <tr>
        <td width="19%" height="30" align="center" valign="middle" bgcolor="#a4c2c2">ID Penjualan </td>
        <td width="16%" align="center" valign="middle" bgcolor="#a4c2c2">ID Buku </td>
        <td width="16%" align="center" valign="middle" bgcolor="#a4c2c2">ID Kasir </td>
        <td width="15%" align="center" valign="middle" bgcolor="#a4c2c2">Jumlah</td>
        <td width="13%" align="center" valign="middle" bgcolor="#a4c2c2">Total</td>
        <td width="16%" align="center" valign="middle" bgcolor="#a4c2c2">Tanggal</td>
        <td colspan="2" align="center" valign="middle" bgcolor="#a4c2c2">Fungsi</td>
      </tr>
      <?php do { ?>
        <tr>
          <td bgcolor="#CCCCCC"><?php echo $row_rcPenjualan['id_penjualan']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcPenjualan['id_buku']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcPenjualan['id_kasir']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcPenjualan['jumlah']; ?></td>
          <td bgcolor="#CCCCCC">Rp.<?php echo $row_rcPenjualan['total']; ?></td>
          <td bgcolor="#CCCCCC"><?php echo $row_rcPenjualan['tanggal']; ?></td>
          <td width="3%" bgcolor="#CCCCCC"><form id="frmEdit" name="frmEdit" method="post" action="/www.tokobuku.com/Master/Penjualan_edit.php">
            <input name="hdnEdit" type="hidden" id="hdnEdit" value="<?php echo $row_rcPenjualan['id_penjualan']; ?>" />
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Edit</button>
          </form>          </td>
          <td width="2%" bgcolor="#CCCCCC"><form id="frmHapus" name="frmHapus" method="post" action="/www.tokobuku.com/Master/Penjualan_hapus.php">
            <input name="hdnHapus" type="hidden" id="hdnHapus" value="<?php echo $row_rcPenjualan['id_penjualan']; ?>" />
			<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span>Hapus</button>
          </form>          </td>
        </tr>
        <?php } while ($row_rcPenjualan = mysql_fetch_assoc($rcPenjualan)); ?>
  </table>
  <br />
<br />
<br />

</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>
<?php
mysql_free_result($rcPenjualan);
?>
