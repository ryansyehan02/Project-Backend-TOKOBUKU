<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Data</title>
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
				<li class="active"><a href="#">Tambah Data</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?php include('../tanggal.php'); ?></a></li>
				<li><a href="Penjualan_cari.php"><span class="glyphicon glyphicon-search"></span>Cari Data</a></li>
			</ul>
   </div>
</nav>
<div class="container-fluid">
	<?php
		error_reporting(0);
		mysql_connect("localhost","root","");
		mysql_select_db("dbtokobuku");
		
		$idpenjualan=$_POST['txtPenjualan'];
		$idbuku=$_POST['listBuku'];
		$idkasir=$_POST['listKasir'];
		$jumlah=$_POST['txtJumlah'];
		$total=$_POST['txtTotal'];
		$tanggal=$_POST['txtTanggal'];
		$proses=$_POST['btnProses'];
		
		$dataBuku=mysql_query("SELECT * FROM buku");
		$dataKasir=mysql_query("SELECT * FROM kasir");
		
		$d=date('Y-m-d');
	?>
	<form action="Penjualan_tambah.php" method="post" name="frmPenjualan" id="frmPenjualan">
		<table width="30%" border="0" align="center" cellpadding="1" cellspacing="0">
  			<tr>
   				<th align="right" valign="middle" scope="col">ID Penjualan : </th>
    			<th align="left" valign="middle" scope="col">
    			  <input name="txtPenjualan" type="text" id="txtPenjualan" class="form-control" />    			</th>
  			</tr>
  			<tr>
    			<th align="right" valign="middle" scope="row">ID Buku : </th>
    			<td align="left" valign="middle">
    			  <select name="listBuku" id="listBuku" class="form-control">
				  <?php
				  		while($buku=mysql_fetch_array($dataBuku)) 
						{
							print"<option value='$buku[id_buku]'>$buku[id_buku]</option>";
						}
				  ?>
  			      </select>    			</td>
  			</tr>
  			<tr>
    			<th align="right" valign="middle" scope="row">ID Kasir : </th>
    			<td align="left" valign="middle">
				  <select name="listKasir" id="listKasir" class="form-control">
					<?php
						while($kasir=mysql_fetch_array($dataKasir))
						{
							print"<option value='$kasir[id_kasir]'>$kasir[id_kasir]</option>";
						}
					?>
                </select></td>
  			</tr>
  			<tr>
    			<th align="right" valign="middle" scope="row">Jumlah : </th>
    			<td align="left" valign="middle">
					<input name="txtJumlah" type="text" id="txtJumlah" class="form-control" />
				</td>
  			</tr>
  			<tr>
  			  	<th align="right" valign="middle" scope="row"> Tanggal : </th>
  			  	<td align="left" valign="middle">
			  		<input name="txtTanggal" type="text" value="<?php echo $d; ?>" class="form-control" readonly="" />
				</td>
		  </tr>
  			<tr>
  			  <th align="right" valign="middle" scope="row">&nbsp;</th>
  			  <td align="left" valign="middle">
			  <input name="btnProses" type="submit" value="PROSES" class="btn btn-primary btn-block" />
		      <?php
					if($proses)
					{
						$tampilharga=mysql_query("SELECT * FROM buku WHERE id_buku='$idbuku'");
						$harga=mysql_fetch_array($tampilharga);
						
						$total=$jumlah*$harga["harga_jual"];
						
						$insert=mysql_query("INSERT INTO penjualan(id_penjualan,id_buku,id_kasir,jumlah,total,tanggal) VALUES('$idpenjualan','$idbuku','$idkasir','$jumlah','$total','$tanggal')");
					}
				?>
				</td>
		  </tr>
  			<tr>
  			  	<th align="right" valign="middle" scope="row">Total :</th>
  			  	<td align="left" valign="middle">
			  		<input name="txtTotal" type="text" id="txtTotal" value="<?php echo $total; ?>" class="form-control" readonly="" />
				</td>
		  </tr>
	  </table>

  </form>
</div>
	<div class="footer" align="center">
	www.tokobuku.com
	<br />
	Ryan Syehan Pratama&copy;
	</div>
</body>
</html>