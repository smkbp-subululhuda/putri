<?php
session_start();
ob_start();
include "library/config.php";
//print_r($_SESSION);
if (empty($_SESSION['username']) or
    empty($_SESSION['password']))
{
//    echo "<script>
//    window.alert('Maaf, anda harus login terlebih dahulu!');
//    window.location.href='login.php';
//    </script>";
//    modifikasi ke landing
    echo "<script>
    window.location.href='landing/';
    </script>";
} else {
    define('INDEX', true);
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<?php include "parts/head.php" ?>
<!--

BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

<?php include "parts/header/header.php" ?>

<?php
switch ($_SESSION['role']) {
    case 1: //admin
        include "parts/sidebar-left-1.php";
        break;
    case 2: //operator
        include "parts/sidebar-left-2.php";
        break;
    case 3: //manager
        include "parts/sidebar-left-3.php";
        break;
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php include "konten.php" ?>
  </div>
  <!-- /.content-wrapper -->

  <?php include "parts/footer.php" ?>

  <?php // include "parts/sidebar-right.php" ?>
  
</div>
<!-- ./wrapper -->

<?php include "parts/js-files.php" ?>

</body>
</html>