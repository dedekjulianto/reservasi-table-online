<?php
  $reserve_id = $_GET["id_pesanan"];

  $query = mysqli_query($koneksi, "SELECT status FROM pesan_table WHERE id_pesanan='$reserve_id'");
  $row = mysqli_fetch_assoc($query);
  $status = $row['status'];

?>

<form action="<?php echo BASE_URL."index.php?page=myprofile&module=table&action=list" ?>" method="post">
  <div class="element-form">
    <label>Pesanan Id</label>
    <span><input type="text" value="<?php echo $reserve_id ?>" readonly="true" /></span>
  </div>
  <div class="element-form">
    <label>Status</label>
    <span>
      <select name="status">
        <?php
            foreach ($arrayStatus as $key => $value) {
              if ($status == $key) {
                echo "<option value='$key' selected='true'>$value</option>";
              } else {
                echo "<option value='$key'>$value</option>";
              }
            }
          ?>
      </select>
    </span>
  </div>

  <div id="element-form">
    <span><input type="submit" value="Submit" name="button" /></span>
  </div>
</form>

<?php
  $button = "Submit";
  if ($button) {
    mysqli_query($koneksi, "UPDATE pesan_table SET status=1 WHERE id_pesanan='$reserve_id'");
  }

 ?>
