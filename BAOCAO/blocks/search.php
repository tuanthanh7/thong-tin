<div class="home"><a href="index.php">TRANG CHỦ</a></div>
<div class="timkiem">
    <form action="index.php" method="GET">
        <input type="text" class="inputTimKiem" name="timkiem" placeholder="Nhập tên sản phẩm bạn muốn tìm">
        <input type="hidden" name="page" value="blocks/kqtimkiem.php">
        <input type="submit" class="submitTimKiem" value="Tìm">
    </form>
</div>
<div class="taikhoan">
    <?php
    if (isset($_SESSION["taikhoan"])) {
        if (isset($_SESSION["loaitaikhoan"])) {
            echo '<span>Xin chào ' . $_SESSION["tentaikhoan"] . '</span><a href="index.php?page-admin=blocks/admin.php" class ="quanly">QUẢN LÝ</a><a class="dndx" href="blocks/dangxuat.php">ĐĂNG XUẤT</a>';
        } else {
            echo '<span>Xin chào ' . $_SESSION["tentaikhoan"]  . '</span><a class="dndx" href="blocks/dangxuat.php">ĐĂNG XUẤT</a>';
        }
    } else {
        echo '<a class="dndx" href="index.php?page-dangnhap=blocks/dangnhap.php">ĐĂNG NHẬP</a>';
    }
    ?>
</div>