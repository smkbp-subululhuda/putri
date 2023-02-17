<?php
session_start();
session_destroy();
echo "<script>
    window.alert('Anda telah logout!');
    window.location.href='landing/';
    </script>";
?>