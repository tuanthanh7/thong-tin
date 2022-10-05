<!-- Trang đăng ký ngoài body -->

<body style="background-color: #14213d ;">
    <div class="dangky">
        <form class="form-dangky" method="POST">
            <div class="banner">ĐĂNG KÝ</div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="taikhoan">
                <label for="account" class="label">TÊN TÀI KHOẢN</label>
            </div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="matkhau">
                <label for="account" class="label">MẬT KHẨU</label>
            </div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="ho">
                <label for="account" class="label">HỌ</label>
            </div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="ten">
                <label for="account" class="label">TÊN</label>
            </div>
            <div class="form">
                <input type="text" class="input" placeholder=" " name="sdt">
                <label for="account" class="label">SỐ ĐIỆN THOẠI</label>
            </div>

            <div class="form">
                <input type="text" class="input" placeholder=" " name="diachi">
                <label for="account" class="label">ĐỊA CHỈ</label>
            </div>

            <div>
                <input type="submit" value="ĐĂNG KÝ" class="button-dangky">
            </div>
            <?php
            if (isset($_POST["taikhoan"])) {
            ?>
                <div class="thongbao">
                <?php
                // $_POST[] sẽ trả về false nếu ô không nhập
                if (
                    $_POST["taikhoan"] and $_POST["matkhau"]
                    and $_POST["ho"] and $_POST["ten"]
                    and $_POST["sdt"] and $_POST["diachi"]
                ) {
                    //Kiểm tra tài khoản có tồn tại chưa
                    $tk = KT_TaiKhoan($conn, $_POST["taikhoan"]);
                    if (mysqli_num_rows($tk) > 0) {
                        //Nếu tài khoản tồn tại
                        echo "Tên tài khoản đã tồn tại, xin vui lòng chọn tên tài khoản khác";
                    } else {
                        //Nếu tài khoản chưa tồn tại
                        if (dangKy_TK($conn, $_POST["taikhoan"], $_POST["matkhau"], $_POST["ho"], $_POST["ten"], $_POST["sdt"], $_POST["diachi"])) {
                            echo "Đăng ký tài khoản thành công!";
                        } else {
                            echo "Đăng ký tài khoản thất bại";
                        }
                    }
                } else {
                    echo "Cần phải nhập đầy đủ thông tin!";
                }
                echo "</div>";
            }
                ?>
                <div class="undo" style=" text-align: right;margin: 20px;">
                <a href="index.php?page-dangnhap=blocks/dangnhap.php" style="color: white;">Quay lại đăng nhập</a>
            </div>
                
        </form>
    </div>
</body>