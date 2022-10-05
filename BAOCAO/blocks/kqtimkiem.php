<div class="kqtimkiem">
    <div class="timkiem-container">
        <?php
        if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "") {
            $kqtim = timKiem($conn, $_GET["timkiem"]);
            if (mysqli_num_rows($kqtim) > 0) {
                while ($r = mysqli_fetch_array($kqtim)) {
        ?>
                    <a href="index.php?page=blocks/chitiet.php&masp=<?php echo $r["masp"] ?>" class="sanpham-item">
                        <div class="hinhanh"><img src="images/<?php echo $r["hinhanh"] ?>.jpg" alt=""></div>
                        <div class="thongtin">
                            <div class="tensp"><?php echo $r["tensp"] ?></div>
                            <div class="giasp"><?php echo number_format($r["giaban"]) ?>đ</div>
                        </div>
                    </a>
        <?php
                }
            } else {
                echo "Không tìm thấy kết quả";
            }
        } else {
            echo 'Không tìm thấy kết quả';
        }
        ?>
    </div>
</div>