<?php   
    if(!isset($_FILES["fileupload"])){
        echo "Dữ liệu không đúng cấu trúc";
        die;
    }

    //Thư mục lưu file upload
    $target_dir = "images/";
    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
    $target_file = $target_dir.basename($_FILES["fileupload"]["name"]);

    $allowUpload = true;

    //Lấy phần mở rộng của file
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 800000;

    if (isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false){
            echo "Đây là file ảnh - " . $check["mime"].".";
            $allowUpload = true;
        }
        {
            echo "Không phải file ảnh.";
            $allowUpload = false;
        }
    }

    //Nếu file đã tồn tại thì không được up
    if (file_exists($target_file))
    {
        echo "Tên file đã tồn tại trên server, không được ghi đè";
        $allowUpload = false;
    }

    
    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
        {
            echo "File ". basename( $_FILES["fileupload"]["name"]).
            " Đã upload thành công.";

            echo "File lưu tại " . $target_file;

        }
        else
        {
            echo "Có lỗi xảy ra khi upload file.";
        }
    }
    else
    {
        echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
    }
?>