<?php
  if ($guest_id) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
  } else {
    header("location:".BASE_URL."index.php?page=login");
  }

  $menu = isset($_SESSION['menu']) ? $_SESSION['menu'] : array();
  $totalMenu = count($menu);

 ?>
<div id="bg-page-profile">
  <div id="menu-profile">
    <ul>
      <?php
        if ($level == "admin") {
       ?>
          <li>
            <a <?php if($module=="user"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=user&action=list"; ?>">User</a>
          </li>
          <li>
            <a <?php if($module=="meja"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=meja&action=list"; ?>">Meja</a>
          </li>
          <li>
            <a <?php if($module=="menu"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=menu&action=list"; ?>">Menu</a>
          </li>
      <?php
        }
       ?>

       <?php
       if ($level == "receptionist" || $level == "tamu") {
       ?>
        <li>
          <a <?php if($module=="invoice"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=invoice&action=list"; ?>">Invoice Menu</a>
        </li>
        <li>
          <a <?php if($module=="table"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=table&action=list"; ?>">Invoice Table</a>
        </li>
        <?php
          }
         ?>
         <?php
            if ($level == "tamu") {
          ?>
          <li>
            <a <?php if($module=="reserveTable"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=reserveTable&action=list"; ?>">Reserve Table
              <?php
                if($totalReserve != 0) {
                  echo "<span class='reserveBarang'>$totalReserve</span>";
                }
              ?>
            </a>
          </li>
        <li>
          <a <?php if($module=="order"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=order&action=list"; ?>">
            Your Order
            <?php
              if ($totalMenu != 0) {
                echo "<span class='total-menu'>$totalMenu</span>";
              }
             ?>
          </a>
        </li>
        <?php
          }
         ?>
         <?php
            if ($level == "admin" || $level == "tamu") {
         ?>
         <li>
           <a <?php if($module=="reserveMenu"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=myprofile&module=reserveMenu&action=list"; ?>">Reserve Menu</a>
         </li>
         <?php
            }
         ?>
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
