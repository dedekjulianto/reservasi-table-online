<?php
  $meja_id = isset($_GET['meja_id']) ? $_GET['meja_id'] : false;

  $button = "Update";

    $query = mysqli_query($koneksi, "SELECT * FROM meja WHERE meja_id='$meja_id'");
    $row = mysqli_fetch_assoc($query);

    $nomor = $row['nomor'];
    $kapasitas = $row['kapasitas'];
    $status = $row['status'];

 ?>

 <form action="<?php echo BASE_URL."module/meja/action.php?meja_id=$meja_id"; ?>" method="post" enctype="multipart/form-data">

   <div class="element-form">
     <label>Nomor Meja</label>
     <span><input type="text" name="nomor" value="<?php echo $nomor; ?>" readonly="true" /></span>
   </div>
   <div class="element-form">
     <label>Kapasitas</label>
     <span>
       <input type="text" name="kapasitas" value="<?php echo $kapasitas; ?>" readonly="true" />
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
   </div>


 </form>
