<?php

    $user_id = isset($_GET['tamu_id']) ? $_GET['tamu_id'] : "";

	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM users WHERE tamu_id='$user_id'");

	$row=mysqli_fetch_array($queryUser);

	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?tamu_id=$user_id"?>" method="POST">

	<div class="element-form">
		<label>Nama Lengkap</label>
		<span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Email</label>
		<span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Phone</label>
		<span><input type="text" name="phone" value="<?php echo $phone; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Alamat</label>
		<span><input type="text" name="alamat" value="<?php echo $alamat; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Level</label>
		<span>
			<input type="radio" value="receptionist" name="level" <?php if($level == "receptionist"){ echo "checked"; } ?> /> Receptionist
			<input type="radio" value="tamu" name="level" <?php if($level == "tamu"){ echo "checked"; } ?> /> Tamu
			<input type="radio" value="admin" name="level" <?php if($level == "admin"){ echo "checked"; } ?> /> Admin
		</span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off
		</span>
	</div>

	<div class="element-form">
    <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
		<!-- <span><button type="submit" name="button" value="<?php echo $button; ?>" class="tombol-action" /><?php echo $button; ?></span> -->
	</div>
</form>
