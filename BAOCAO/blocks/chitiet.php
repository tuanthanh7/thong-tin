<div class="chitiet-page">
    <?php
    $chitiet = laySP_DM($conn, $_GET["masp"]);
    $r = mysqli_fetch_array($chitiet);
    ?>
    <div class="link"> <?php echo $r["Tenloai"] . ' › ' . $r["tensp"] ?></div>
    <div class="tensp"><?php echo $r["tensp"] ?></div>
    <div class="noidung">
        <div class="left">
            <div class="hinhanh"><img src="images/<?php echo $r["hinhanh"] ?>.jpg" alt=""></div>
            <div class="chitiet">
                <p style="font-size: 25px; text-align: left;">Chi tiết sản phẩm</p>
                <p style="font-size: 15px; text-align: left;"><?php echo $r["chitiet"] ?></p>
            </div>
        </div>
        <div class="right">
            Giá bán trực tiếp
            <div class="gia"><?php echo number_format($r["giaban"]) ?>đ</div>
            <div class="khuyenmai">
                <div class="tieudekm">Khuyến mãi</div>
                <div class="thoigiain">Giá và khuyến mãi dự kiến áp dụng đến 23:00 21/06</div>
            </div>
            <div class="noidungkm">
                <p> &#9752 Tặng cho khách lần đầu mua hàng online tại web <br>
                &#10144 Mã giảm 20% tối đa 100.000đ <br>

                &#10144 FREEship đơn hàng từ 300.000đ <br>

                &#10144 Áp dụng tại Tp.HCM và 1 số khu vực, 1 SĐT nhận 1 lần <a href="#">(Xem chi tiết)</a></p>
                <p> &#10004 Tặng suất mua xe đạp Giảm đến 30% (không kèm khuyến mãi khác) <a href="#">(Xem chi tiết)</a> </p>
                <p> &#10004 Tặng suất mua kèm đồng hồ Beu giảm 30% (không áp dụng khuyến mãi khác của đồng hồ) </p>

                <p> &#10004 Mua Đồng hồ thời trang giảm 40% cho Đồng hồ dưới 3 triệu, giảm 30% cho Đồng hồ từ 3 triệu trở lên </p>

                <p> &#10004 Chuột Asus TUF M3 Giảm 40% khi mua kèm Điện thoại, Laptop </p>
            </div>
            <a class ="muangay" href="#">MUA NGAY</a> 
        </div>
    </div>
</div>