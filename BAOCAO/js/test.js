// function showSP() {
//     document.getElementById('sp').setAttribute("class", "show");
//     document.getElementById('dm').setAttribute("class", "hide");
//     document.getElementById('dssp').setAttribute("class", "hide");
//     document.getElementById('dsdm').setAttribute("class", "hide");
// }
// function showDM() {
//     document.getElementById('sp').setAttribute("class", "hide");
//     document.getElementById('dm').setAttribute("class", "show");
//     document.getElementById('dssp').setAttribute("class", "hide");
//     document.getElementById('dsdm').setAttribute("class", "hide");
// }
function showAD(id) {
    var arr = new Array('sp', 'dm', 'dssp', 'dsdm');
    //Chuyển thẻ sp,dm,dssp,dsdm về trạng thái show
    document.getElementById(id).setAttribute("class", "show");
    //Chuyển những thẻ không phải id về trạng thái hide
    for (var item = 0; item < arr.length; item++) {
        if (arr[item] != id) {
            document.getElementById(arr[item]).setAttribute("class", "hide");
            // console.log(arr[item]);
        }
        
    }
}
function xoaSP($conn,$masp){
    $sql = "delete from sanpham where masp ='$masp'";
    mysqli_query($conn,$sql);
}
// bắt trống