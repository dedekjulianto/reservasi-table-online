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
$query = mysqli_query($koneksi, "SELECT pesan_table.id_pesanan, pesan_table.nama_pemesan, pesan_table.nomor_telepon, pesan_table.alamat, pesan_table.tanggal_pesan, pesan_table.tanggal, users.nama FROM pesan_table JOIN users ON pesan_table.tamu_id=users.tamu_id WHERE pesan_table.id_pesanan='$reserve_id'");
$row = mysqli_fetch_assoc($query);
$tanggal_pesan = $row['tanggal_pesan'];
$nama_pemesan = $row['nama_pemesan'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$nama = $row['nama'];
$tanggal = $row['tanggal'];
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
#frame-keterangan {
  margin-top: 50px;
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
  <tr>
    <td>Tanggal Booking</td>
    <td>:</td>
    <td><?php echo $tanggal ?></td>
  </tr>
</table>

<!-- <p align="left">Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); echo $date = date('Y-m-d |  H:i:s'); ?> </p> -->

<table class="table-list">
	<tr class="baris-title">
		<th>No.</th>
		<th>Nomor Meja</th>
		<th>Kapasitas</th>
		<th>Tipe Meja</th>
	</tr>
<?php
$queryDetail = mysqli_query($koneksi, "SELECT invoice_table.*, meja.nomor FROM invoice_table JOIN meja ON invoice_table.meja_id=meja.meja_id WHERE id_pesanan='$reserve_id'");
$no=1;
while ($rowDetail=mysqli_fetch_assoc($queryDetail)) {
  echo "<tr class='tengah'>
          <td class='tengah'>$no</td>
          <td class='tengah'>$rowDetail[nomor]</td>
          <td class='tengah'>$rowDetail[kapasitas]</td>
          <td class='tengah'>$rowDetail[tipe]</td>
        </tr>";
  $no++;
}
?>
</table>
<div id="frame-keterangan">
  <p>Silahkan datang tepat waktu<br/>
     Customer Service : 0000-9999-8888<br/>
  </p>
</div>

<!--CONTOH Code END-->

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
