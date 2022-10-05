<div class="sptheodm">
    <div class="tieudedm">
        <?php
        $csdldmtheomaloai = layDanhMuc_TheoMaLoai($conn, $_GET["id"]);
        while ($danhmuctml = mysqli_fetch_array($csdldmtheomaloai)) {
        ?>
            <?php
            echo $danhmuctml["Tenloai"];
            ?>
        <?php
        }
        ?>
    </div>
    <div class="sanpham-container">
        <?php
        $csdlsanphamtdm = laySP_TheoDM($conn, $_GET["id"]);
        while ($sanpham = mysqli_fetch_array($csdlsanphamtdm)) {
        ?>
            <a href="index.php?page=blocks/chitiet.php&masp=<?php echo $sanpham["masp"] ?>" class="sanpham-item">
                <div class="hinhanh"><img src="images/<?php echo $sanpham["hinhanh"] ?>.jpg" alt=""></div>
                <div class="thongtin">
                    <div class="tensp"><?php echo $sanpham["tensp"] ?></div>
                    <div class="giasp"><?php echo number_format($sanpham["giaban"])?>đ</div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</div>