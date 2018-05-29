<?php
  if ($guest_id) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
  } else {
    header("location:".BASE_URL."index.php?page=login");
  }
 ?>
<div id="bg-page-profile">
  <div id="menu-profile">
    <ul>
      <li>
        <a <?php if($module=="reserve"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=reserve&action=list"; ?>">Reserve
          <?php
            if($totalReserve != 0) {
              echo "<span class='reserveBarang'>$totalReserve</span>";
            }
          ?>
        </a>
      </li>
      <li>
        <a <?php if($module=="invoice"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=invoice&action=detail"; ?>">Invoice</a>
      </li>
    </ul>
  </div>
  <div id="profile-content">
    <?php
      $file = "module/$module/$action.php";
      if (file_exists($file)) {
        include_once($file);
      } else {
        echo "<h3>Maaf halaman tersebut tidak ditemukan";
      }
     ?>
  </div>
</div>
