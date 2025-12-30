<?php virtual('/www.tokobuku.com/Connections/koneksi.php'); ?>
<?php
mysql_select_db($database_koneksi, $koneksi);
$query_rcBuku = "SELECT * FROM buku";
$rcBuku = mysql_query($query_rcBuku, $koneksi) or die(mysql_error());
$row_rcBuku = mysql_fetch_assoc($rcBuku);
$totalRows_rcBuku = mysql_num_rows($rcBuku);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Buku</title>
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
				<li class="active"><a href="dtBuku.php">Data Buku</a></li>
				<li><a href="dtPenjualan.php">Data Penjualan</a></li>
				<li><a href="dtKasir.php">Data Kasir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Buku_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   		</div>
</nav>
<br />
	<br />
	<br />
	<br />
<div class="container-fluid">
	<a href="Buku_tambah.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
	<a href="Buku_print.php" class="btn btn-danger"><span class="glyphicon glyphicon-print"></span>Cetak</a>
	<br />
  <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="table table-responsive">
    <tr>
      <td align="center" valign="middle" bgcolor="#a4c2c2">ID Buku </td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Judul</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">NO ISBN </td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Penulis</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Penerbit</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Tahun</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">STOK</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Harga Pokok </td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Harga Jual </td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">PPN</td>
      <td align="center" valign="middle" bgcolor="#a4c2c2">Diskon</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#a4c2c2">Fungsi</td>
    </tr>
    <?php do { ?>
      <tr>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['id_buku']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['judul']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['noisbn']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['penulis']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['penerbit']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['tahun']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['stok']; ?></td>
        <td bgcolor="#CCCCCC">Rp.<?php echo $row_rcBuku['harga_pokok']; ?></td>
        <td bgcolor="#CCCCCC">Rp.<?php echo $row_rcBuku['harga_jual']; ?></td>
        <td bgcolor="#CCCCCC">Rp.<?php echo $row_rcBuku['ppn']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_rcBuku['diskon']; ?>%</td>
        <td bgcolor="#CCCCCC"><form id="frmEdit" name="frmEdit" method="post" action="/www.tokobuku.com/Master/Buku_edit.php">
          <input name="hdnEdit" type="hidden" id="hdnEdit" value="<?php echo $row_rcBuku['id_buku']; ?>" />
		  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Edit</button>
        </form>        </td>
        <td bgcolor="#CCCCCC"><form id="frmHapus" name="frmHapus" method="post" action="/www.tokobuku.com/Master/Buku_hapus.php">
          <input name="hdnHapus" type="hidden" id="hdnHapus" value="<?php echo $row_rcBuku['id_buku']; ?>" />
		  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span>Hapus</button>
        </form>        </td>
      </tr>
      <?php } while ($row_rcBuku = mysql_fetch_assoc($rcBuku)); ?>
  </table>
  </div>
  <BR />
  <BR />
  <BR />
  	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>
<?php
mysql_free_result($rcBuku);
?>
