<?php 
    if(isset($_POST["tk"]))
    {
        $sql = "select * from taikhoan where tentk = ''";
    }
?>

<form action="#" method="POST">
    Tài khoản
    <input type="text" name="tk">
    Mật khẩu
    <input type="text" name="mk">
    <input type="submit" value="Đăng nhập">
</form>