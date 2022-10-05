<?php
// require "conn.php";
// if(isset($_POST["login"]))
// {
// 	$user=$_POST["user"];
// 	$pass=$_POST["pass"];
// 	$sql="select * from taikhoan where tentk='$user'";
// 	$result=mysqli_query($conn,$sql);

// 	if(mysqli_num_rows($result)>0)
// 	{
// 		$pass_h=md5($pass);
// 		$r=mysqli_fetch_array($result);
// 		if($r["matkhau"]==$pass_h)
// 		{
// 			$_SESSION["login"]=1;
// 			$_SESSION["user"]=$user;
// 			header("Location: Index.php");
// 		}
// 	}
// }
?>

<!-- Trang đăng nhập ngoài body -->

<body style="background-color: #14213d ;">
    <div class="dangnhap">
        <form class="form-dangnhap" action="#" method="post">
            <div class="banner">ĐĂNG NHẬP VÀO TÀI KHOẢN CỦA BẠN</div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="taikhoan">
                <label for="account" class="label">TÀI KHOẢN CỦA BẠN</label>
            </div>
            <div class="form">
                <input type="password" class="input" placeholder=" " name="matkhau">
                <label for="account" class="label">MẬT KHẨU CỦA BẠN</label>
            </div>
            <div>
                <input type="submit" value="ĐĂNG NHẬP" class="button-dangnhap">
            </div>
            <!-- PHP XỬ LÝ -->
            <?php

            if (isset($_POST["taikhoan"])) {
            ?>
                <div class="thongbao">
                    <?php
                    if ($_POST["taikhoan"]) {

                        $taikhoan = $_POST["taikhoan"];
                        $sql = "select * from taikhoan where tentk = '$taikhoan'";

                        $re = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($re) > 0) {
                            $r = mysqli_fetch_array($re);
                            if ($r["matkhau"] == $_POST["matkhau"]) {
                                $_SESSION["taikhoan"] = $r["tentk"];
                                $_SESSION["tentaikhoan"] = $r["ten"];
                                if ($r["loaitaikhoan"] == 1) {
                                    $_SESSION["loaitaikhoan"] = $r["loaitaikhoan"];
                                    header("Location: index.php?page-admin=blocks/admin.php");
                                } else if ($r["loaitaikhoan"] == 0) {
                                    header("Location: index.php");
                                }
                            } else {
                                echo "Sai mật khẩu";
                            }
                        } else {
                            echo "Tài khoản không tồn tại";
                        }
                    } else {
                        echo "Cần phải nhập đầy đủ thông tin";
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            <!-- KẾT THÚC XỬ LÝ -->
            <a href="index.php?page-dangnhap=blocks/dangky.php" class="form-footer">Chưa có tài khoản?</a>
        </form>
    </div>
</body>