<?php  
    session_start();
    unset($_SESSION["taikhoan"]);
    unset($_SESSION["matkhau"]);
    unset($_SESSION["loaitaikhoan"]);
    header("Location: ../index.php")
?>