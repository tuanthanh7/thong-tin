<?php
if (isset($_GET["idxoa"])) {
    if (xoaSP($conn, $_GET["idxoa"])) {
        $thongbao = "Sản phẩm đã Update";
    }
}
if (isset($_GET["idxoadanhmuc"])) {
    if (anDM($conn, $_GET["idxoadanhmuc"])) {
        $thongbao = "Danh mục đã Update";
    }
}
if (isset($_GET["idhoantacdm"])){
    if (hoantacDM($conn, $_GET["idhoantacdm"])) {
        $thongbao = "Danh mục đã được hoàn tác";
    }
}
$danhmuc = layDanhMuc($conn);
$sanpham = laySP($conn);
?>
<div class="admin">
    <div class="control-bar">
        <div class="dx-tc">
            <a href="index.php" class="trangchu">Về trang chủ</a>
            <a href="blocks/dangxuat.php" class="dangxuat">Đăng xuất</a>
        </div>
    </div>
    <div class="control">
        ĐIỀU KHIỂN
        <div class="control-button">
            <div class="themsanpham">
                <a href="index.php?page-admin=blocks/admin.php&page-control=sanpham">

                    <!-- <a onclick="showAD('sp')"> -->
                    Thêm sản phẩm
                </a>
            </div>
            <div class="themdanhmuc">
                <a href="index.php?page-admin=blocks/admin.php&page-control=danhmuc">
                    <!-- <a onclick="showAD('dm')"> -->
                    Thêm danh mục
                </a>
            </div>
            <div class="dssanpham">
                <a href="index.php?page-admin=blocks/admin.php&page-control=dssanpham">
                    <!-- <a onclick="showAD('dssp')"> -->
                    Xem danh sách sản phẩm
                </a>
            </div>
            <div class="dsdanhmuc">
                <a href="index.php?page-admin=blocks/admin.php&page-control=dsdanhmuc">
                    <!-- <a onclick="showAD('dsdm')"> -->
                    Xem danh sách danh mục
                </a>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["page-control"])) {
        if ($_GET["page-control"] == "sanpham") {
    ?>
            <div id="sp" class="show">
                <form action="#" enctype="multipart/form-data" method="POST">
                    <!-- Gủi biến xử lý cho ảnh -->
                    <input type="hidden" name="xuly" value="themSP">
                    <label for="txtTenSP">Nhập tên sản phẩm</label>
                    <input type="text" name="txtTenSP" id="txtTenSP">
                    <label for="txtGia">Nhập giá sản phẩm</label>
                    <input type="text" name="txtGia" id="txtGia">
                    <label for="txtChiTiet">Nhập chi tiết sản phẩm</label>
                    <textarea name="txtChiTiet" id="txtChiTiet" cols="30" rows="10"></textarea>
                    <label for="txtSoLuong">Nhập số lượng sản phẩm</label>
                    <input type="text" name="txtSoLuong" id="txtSoLuong">

                    <label for="txtMaLoai">Nhập loại sản phẩm</label>

                    <select name="txtMaLoai" id="txtMaLoai">
                        <option value="" selected> - Hãy chọn danh mục - </option>

                        <?php
                        while ($r = mysqli_fetch_array($danhmuc)) {
                        ?>

                            <!-- Duyệt: Chưa làm -->

                            <option value="<?php echo $r["Maloai"] ?>"><?php echo $r["Maloai"] ?> - <?php echo $r["Tenloai"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- <input type="text" name="txtMaLoai" value = "1"> -->
                    <input class="upload" style="border: 1px transparent;" type="file" name="fileupload" id="fileupload">
                    <div style="color: red; font-style: italic;font-weight: 550;">Lưu ý: Chỉ upload được file ảnh .jpg</div>
                    <input type="submit" value="Thêm" name="submit" class="submit">
                </form>
            </div>
            <?php
            require "blocks/xuly.php";
            ?>
        <?php
        } else if ($_GET["page-control"] == "danhmuc") {
        ?>
            <div id="dm" class="show">
                <form action="#" method="POST">
                    <input type="hidden" name="xuly" value="themdanhmuc">
                    <label for="txtTenLoai">Nhập tên loại</label>
                    <input type="text" name="txtTenLoai" id="txtTenLoai">
                    <label for="txtNoiBat">Nhập nổi bậc</label>
                    <select name="txtNoiBat" id="txtNoiBat">
                        <option value="" selected> - Chọn nổi bật - </option>
                        <option value="1">Nổi bật</option>
                        <option value="0">Bình thường</option>
                    </select>
                    <input type="submit" class="submit">
                </form>
            </div>

        <?php
            require "blocks/xuly.php";
        } else if ($_GET["page-control"] == "dssanpham") {
        ?>
            <div id="dssp" class="show">
                <?php
                if (isset($thongbao)) {
                    echo $thongbao;
                }
                ?>
                <table border="1px">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Loại</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php

                    while ($sp = mysqli_fetch_array($sanpham)) {
                    ?>
                        <tr>
                            <td><?php $masp = $sp['masp'];
                                echo $sp['masp'] ?></td>
                            <td><?php echo $sp['tensp'] ?></td>
                            <td><?php echo $sp['giaban'] ?></td>
                            <td>
                                <div class="table-chitiet"><?php echo $sp['chitiet'] ?></div>
                            </td>
                            <td><?php echo $sp['soluong'] ?></td>
                            <td><?php echo $sp['maloai'] ?></td>
                            <td><a href="index.php?page-admin=blocks/admin.php&page-control=dssanpham&idxoa=<?php echo $masp; ?>">Xóa</a>
                                <a href="index.php?page-admin=blocks/admin.php&page-control=chinhsua&idsuasanpham=<?php echo $masp; ?>">Chỉnh sửa</a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </table>
            </div>
        <?php
        } else if ($_GET["page-control"] == "dsdanhmuc") {
        ?>
            <div id="dsdm" class="show">
                <?php
                if (isset($thongbao)) {
                    echo $thongbao;
                } ?>
                <table border="1">
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Nổi bật</th>
                        <th>Chức năng</th>
                    </tr>

                    <?php
                    while ($dm = mysqli_fetch_array($danhmuc)) {
                    ?>
                        <tr>
                            <td><?php echo $dm["Maloai"] ?></td>
                            <td><?php echo $dm["Tenloai"] ?></td>
                            <td><?php if ($dm["dmnoibat"] == '1') {
                                    echo "Nổi bật";
                                } else {
                                    echo "Không nởi bật";
                                } ?></td>
                            <td>
                                <?php
                                if ($dm["hidden"] == '1') {
                                    ?>
                                    <a href="index.php?page-admin=blocks/admin.php&page-control=dsdanhmuc&idhoantacdm=<?php echo $dm["Maloai"] ?>">Hoàn tác</a>
                                    <?php
                                } else {
                                ?>
                                    <a href="index.php?page-admin=blocks/admin.php&page-control=dsdanhmuc&idxoadanhmuc=<?php echo $dm["Maloai"] ?>">Xóa</a>
                                <?php
                                }
                                ?>

                                <a href="index.php?page-admin=blocks/admin.php&page-control=chinhsua&idsuadanhmuc=<?php echo $dm["Maloai"] ?>">Chỉnh sửa</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
    <?php
        } else if ($_GET["page-control"] == "chinhsua") {
            require "blocks/trangchinhsua.php";
        }
    }
    ?>


    <!-- <div id="thongbao" class="show"> -->

    <!-- </div> -->
</div>