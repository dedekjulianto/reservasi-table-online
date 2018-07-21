<?php


session_start();
// if(!isset($_SESSION['reserve_id'])){
// 	echo "<script>location.href='login.php'</script>";
// }
 // Define relative path from this script to mPDF
 $nama_dokumen='Detail Order'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<!-- <?php
 //KONEKSI
//$host="localhost"; //isi dengan host anda. contoh "localhost"
//$user="root"; //isi dengan username mysql anda. contoh "root"
//$password=""; //isi dengan password mysql anda. jika tidak ada, biarkan kosong.
//$database="project213";//isi nama database dengan tepat.
//mysql_connect($host,$user,$password);
//mysql_select_db($database);
?> -->
<?php
include_once("./function/koneksi.php");
include_once("./function/helper.php");

$reserve_id = $_GET["reserve_id"];

$query = mysqli_query($koneksi, "SELECT pesanan.id_pesanan, pesanan.nama_pemesan, pesanan.nomor_telepon, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pesan, users.nama FROM pesanan JOIN users ON pesanan.tamu_id=users.tamu_id WHERE pesanan.id_pesanan='$reserve_id'");

$row = mysqli_fetch_assoc($query);

$tanggal_pesan = $row['tanggal_pesan'];
$nama_pemesan = $row['nama_pemesan'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$nama = $row['nama'];
 ?>

<style type="text/css">
p{
	text-align:right;
	font-style:bold;
	font-size:12px
}
h4, h1, h5, h3{
	text-align:center;
	padding-top:inherit;
}
tbody tr:nth-child(odd) {
   background-color: #ccc;
}


.table-list {
  width: 100%;
  border-collapse: collapse;
}
.table-list tr {
  border-bottom: 2px solid ;
}

.table-list tr.baris-title {
  background: #e6e6e6;
}

.table-list tr th, .table-list tr td {
  padding: 10px 7px;
}
.kanan {
  text-align: right;
}
.tengah {
  text-align: center;
}
.kiri {
  text-align: center;
}
</style>
<h3><center>Detail Order</center></h3>
<hr>

<table>
	<tr>
		<td>Nomor Faktur</td>
		<td>:</td>
		<td><?php echo $reserve_id ?></td>
	</tr>
	<tr>
		<td>Nama Pemesan</td>
		<td>:</td>
		<td><?php echo $nama_pemesan ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $alamat ?></td>
	<tr>
	<tr>
    <td>Nomor Telepon</td>
    <td>:</td>
    <td><?php echo $nomor_telepon ?></td>
  </tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $nama ?></td>
	</tr>
	<tr>
		<td>Tanggal Order</td>
		<td>:</td>
		<td><?php echo $tanggal_pesan ?></td>
	</tr>
</table>

<!-- <p align="left">Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); echo $date = date('Y-m-d |  H:i:s'); ?> </p> -->

<table class="table-list">
	<tr class="baris-title">
		<th>No.</th>
		<th>Nama Barang</th>
		<th>Qty</th>
		<th class="kanan">Harga Satuan</th>
		<th class="kanan">Total</th>
	</tr>
<?php
	$queryDetail = mysqli_query($koneksi, "SELECT * FROM invoice JOIN menu ON invoice.id_menu=menu.id_menu WHERE id_pesanan='$reserve_id'");

	$no=1;
	$subTotal = 0;
	while ($rowDetail=mysqli_fetch_assoc($queryDetail)) {
		$total = $rowDetail["harga"] * $rowDetail["quantity"];
		$subTotal = $subTotal + $total;
		echo "<tr class='tengah'>
						<td class='tengah'>$no</td>
						<td class='kiri'>$rowDetail[nama_menu]</td>
						<td class='tengah'>$rowDetail[quantity]</td>
						<td class='kanan'>".rupiah($rowDetail["harga"])."</td>
						<td class='kanan'>".rupiah($total)."</td>
					</tr>";
		$no++;
	}
?>
<tr>
	<td class="kanan" colspan="4"><b>Jumlah Bayar</b></td>
	<td class="kanan"><?php echo rupiah($subTotal); ?></td>
</tr>
</table>

<!--CONTOH Code END-->

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
