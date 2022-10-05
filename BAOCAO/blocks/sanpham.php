<div class="body">
    <div class="noibat">
        <div class="tieude">SẢN PHẨM NỔI BẬT</div>
        <div class="noibat-container">
            <?php
            $csdlspnoibat = laySP_NoiBac($conn);
            while ($noibat = mysqli_fetch_array($csdlspnoibat)) {
            ?>
                <a href="index.php?page=blocks/chitiet.php&masp=<?php echo $noibat["masp"] ?>" class="noibat-item">
                    <div class="hinhanh"><img src="images/<?php echo $noibat["hinhanh"] ?>.jpg" alt=""></div>
                    <div class="thongtin">
                        <div class="tensp"><?php echo $noibat["tensp"] ?></div>
                        <div class="giasp"><?php echo number_format($noibat["giaban"]) ?>đ</div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="sanpham">
        <div class="tieudetatcasp">TẤT CẢ SẢN PHẨM</div>
        <div class="danhmuc">
            <?php
            $csdldm = layDanhMuc($conn);
            while ($danhmuc = mysqli_fetch_array($csdldm)) {
            ?>
                <div class="tendanhmuc"><?php echo $danhmuc["Tenloai"] ?></div>
                <div class="sanpham-container">
                    <?php
                    $csdlsanpham = laySP_TheoDM($conn, $danhmuc["Maloai"]);
                    while ($sanpham = mysqli_fetch_array($csdlsanpham)) {
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
            <?php
            }
            ?>
        </div>
    </div>
</div>