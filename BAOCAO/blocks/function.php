<?php 
    function layDanhMuc($conn){
        $sql = "select * from danhmucsanpham";
        return mysqli_query($conn,$sql);
    }
    function layDanhMuc_TheoMaLoai($conn,$madanhmuc){
        $sql = "select * from danhmucsanpham where maloai = $madanhmuc";
        return mysqli_query($conn,$sql);
    }
    function laySP_NoiBac($conn){
        $sql = "select * from sanpham where noibat = '1'";
        return mysqli_query($conn,$sql);
    }
    function laySP($conn){
        $sql = "select * from sanpham";
        return mysqli_query($conn,$sql);
    }
    function laySP_TheoDM($conn,$madanhmuc){
        $sql = "select * from sanpham where maloai = '$madanhmuc'";
        return mysqli_query($conn,$sql);
    }
    function laySP_DM($conn,$masp){
        $sql = "select * from sanpham,danhmucsanpham 
        where sanpham.maloai = danhmucsanpham.Maloai and sanpham.masp = '$masp'";
        return mysqli_query($conn,$sql);
    }
    function laySP_ID($conn,$masp){
        $sql = "select * from sanpham
        where masp = '$masp'";
        return mysqli_query($conn,$sql);
    }
    function timKiem($conn,$tensp){
        $sql = "select * from sanpham where tensp like '%$tensp%'";
        return mysqli_query($conn,$sql);
    }
    // Thêm sản phẩm
    function themDL($conn,$tensp,$giasp,$chitiet,$hinhanh,$soluonng,$maloai){
        $sql = "insert into sanpham (tensp,giaban,chitiet,hinhanh,soluong,maloai) 
        values ('$tensp','$giasp','$chitiet','$hinhanh','$soluonng','$maloai')";
        if (mysqli_query($conn,$sql)){
            return "Thêm dữ liệu thành công";
        }
        else{
            return "Thêm dữ liệu thất bại";
        }
    }
    //Xóa sản phẩm
    function xoaSP($conn,$masp){
        $sql = "DELETE FROM `sanpham` WHERE `masp` = '$masp'";
        return mysqli_query($conn,$sql);
    }
    function themDM($conn,$tendanhmuc,$noibat){
        $sql = "insert into danhmucsanpham (Tenloai,dmnoibat) values ('$tendanhmuc','$noibat')";
        if (mysqli_query($conn,$sql)){
            return "Thêm dữ liệu thành công";
        }
        else{
            return "Thêm dữ liệu thất bại";
        }
    }
    function dangKy_TK($conn,$tentk,$matkhau,$ho,$ten,$sdt,$diachi){
        $sql = "INSERT INTO taikhoan VALUES(NULL,'$tentk','$matkhau','$ho','$ten','$sdt','$diachi','0')";
        return mysqli_query($conn,$sql);
    }
    function KT_TaiKhoan($conn,$taikhoan){
        $sql = "select * from taikhoan where tentk ='$taikhoan'";
        return mysqli_query($conn,$sql);
    }
    function capnhatSP($conn,$masp,$tensp,$giasp,$chitiet,$soluong,$maloai,$noibat){
        $sql = "UPDATE sanpham SET tensp = '$tensp',giaban = '$giasp',chitiet = '$chitiet',soluong = '$soluong',maloai='$maloai',noibat='$noibat' WHERE masp = '$masp'";    
        return mysqli_query($conn,$sql);
    }
    function capnhatDM($conn,$tendm,$noibat,$maloai){
        $sql = "UPDATE danhmucsanpham SET Tenloai ='$tendm',dmnoibat = '$noibat' WHERE Maloai ='$maloai'";
        return mysqli_query($conn,$sql);
    }
    function anDM($conn,$maloai){
        $sql = "UPDATE danhmucsanpham SET hidden = '1' where Maloai = '$maloai'";
        return mysqli_query($conn,$sql);
    }
    function hoantacdm($conn,$maloai){
        $sql = "UPDATE danhmucsanpham SET hidden = '0' where Maloai = '$maloai'";
        return mysqli_query($conn,$sql);
    }

?>