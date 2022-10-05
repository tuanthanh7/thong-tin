<!-- Xử lý cập nhật sản phẩm -->
<?php
if (isset($_POST["tensp"])) {
    if (capnhatSP($conn, $_POST["masp"], $_POST["tensp"], $_POST["giaban"], $_POST["chitiet"], $_POST["soluong"], $_POST["maloai"], $_POST["noibat"])) {
        $thongbao = "Cập nhật sản phẩm thành công";
    } else {
        $thongbao = "Cập nhật sản phẩm thất bại";
    }
}
if (isset($_POST["tenloai"])) {
    if (capnhatDM($conn, $_POST["tenloai"], $_POST["noibat"],$_POST["maloai"])) {
        $thongbao = "Cập nhật danh mục thành công";
    } else {
        $thongbao = "Cập nhật danh mục thất bại";
    }
}
?>

<div class="chinhsua">
    <?php
    echo "<p>TRANG CHỈNH SỬA SẢN PHẨM</p>";
    if (isset($_GET["idsuasanpham"])) {
        $sps = laySP_ID($conn, $_GET["idsuasanpham"]);
        while ($sp = mysqli_fetch_array($sps)) {
    ?>
            <!-- .admin form -->
            <form action="#" method="POST">
                <input type="hidden" name="masp" value="<?php echo $sp["masp"] ?>">
                <label for="suatensp">Tên sản phẩm: </label>
                <input type="text" name="tensp" id="suatensp" value="<?php echo $sp["tensp"] ?>">
                <label for="suagiaban">Giá sản phẩm: </label>
                <input type="text" name="giaban" id="suagiaban" value="<?php echo $sp["giaban"] ?>">
                <label for="suachitiet">Chi tiết sản phẩm: </label>
                <textarea name="chitiet" id="suachitiet" cols="30" rows="10"><?php echo $sp["chitiet"] ?></textarea>
                <label for="suasoluong">Số lượng: </label>
                <input type="text" name="soluong" id="suasoluong" value="<?php echo $sp["soluong"] ?>">
                <label for="sualoai">Loại: </label>
                <select name="maloai" id="sualoai">
                    <?php
                    $dmsps = layDanhMuc($conn);
                    while ($dmsp = mysqli_fetch_array($dmsps)) {
                    ?>
                        <option name="<?php echo $dmsp["Maloai"] ?>" value="<?php echo $dmsp["Maloai"] ?>"><?php echo $dmsp["Tenloai"] ?></option>
                    <?php } ?>
                </select>
                <script>
                    // getElementsByName lấy danh sách các phần tử có name
                    // Sau đó gán Attribute selected = "selected"
                    document.getElementsByName(<?php echo $sp["maloai"]; ?>)[0].setAttribute("selected", "selected");
                </script>
                <!-- <input type="text" name="maloai" id="sualoai" value="<?php echo $sp["maloai"] ?>"> -->
                <label for="suanoibac">Nổi bậc: </label>
                <select name="noibat" id="suanoibat">
                    <option value="1" name="1">Nổi bật</option>
                    <option value="0" name="0">Không nổi bật</option>
                </select>
                <script>
                    // getElementsByName lấy danh sách các phần tử có name
                    // Sau đó gán Attribute selected = "selected"
                    document.getElementsByName(<?php echo $sp["noibat"]; ?>)[0].setAttribute("selected", "selected");
                </script>
                <br>
                <input type="submit" value="XÁC NHẬN" name="submit" class="submit">
            </form>
        <?php
        }
    }
    if (isset($_GET["idsuadanhmuc"])) {
        $dms = layDanhMuc_TheoMaLoai($conn, $_GET["idsuadanhmuc"]);
        while ($dm = mysqli_fetch_array($dms)) {
        ?>
            <form action="#" method="POST">
                <input type="hidden" name="maloai" value="<?php echo $dm["Maloai"] ?>">
                <label for="">Tên danh mục:</label>
                <input type="text" name="tenloai" value="<?php echo $dm["Tenloai"] ?>">
                <label for="">Nổi bật:</label>
                <select name="noibat" id="">
                    <option value="1" name="dm1">Nổi bật</option>
                    <option value="0" name="dm0">Không nổi bật</option>
                    <script>
                        document.getElementsByName('dm<?php echo $dm["dmnoibat"] ?>')[0].setAttribute("selected", "selected")
                    </script>
                </select>
                <br>
                <input type="submit" value="XÁC NHẬN" name="submit" class="submit">
            </form>
    <?php
        }
        echo "TRANG CHỈNH SỬA DANH MỤC";
    }
    ?>
</div>
<?php
if (isset($thongbao)) {
    echo $thongbao;
}
?>