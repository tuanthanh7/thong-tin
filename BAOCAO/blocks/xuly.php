<!-- Xử lý thêm sản phẩm mới và danh mục mới -->
<?php
if (isset($_POST["xuly"])) {
    if ($_POST["xuly"] == "themSP") {
        // <!-- Thêm sản phẩm -->

        //Phần mở rộng
        $imageFileType = "jpg";
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)

        //tmp_name là thư mục tạm dùng lưu hình ảnh
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], "images/" . $_FILES["fileupload"]["name"])) {
            echo "Đã upload ảnh thành công";
        } else {
            echo "Có lỗi xảy ra khi upload file.";
        }

        // Thêm sản phẩm vào csdl
        if (themDL($conn, $_POST["txtTenSP"], $_POST["txtGia"], $_POST["txtChiTiet"], basename($_FILES["fileupload"]["name"], ".jpg"), $_POST["txtSoLuong"], $_POST["txtMaLoai"])) {
            echo "Thêm sản phẩm thành công";
        } else
            echo "Thêm sản phẩm thất bại";
    } else if ($_POST["xuly"] == "themdanhmuc") {
        if (themDM($conn, $_POST["txtTenLoai"], $_POST["txtNoiBat"])) {
            echo "Thêm danh mục thành công";
        } else {
            echo "Thêm danh mục thất bại";
        }
    }
}
?>