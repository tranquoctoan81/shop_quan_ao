<?php
function addProduct($name, $type, $price, $color, $size, $file_name, $detail, $connect)
{
    $sql = "INSERT INTO sanpham(masanpham,tensanpham,maloai ,gia,mausac,size,img,mota) VALUES ('','$name ','$type','$price','$color','$size','$file_name','$detail')";
    return mysqli_query($connect, $sql);
}
function addNews($file_name, $title, $desc, $connect)
{
    $sql = "INSERT INTO tintuc(matin,anhtintuc,tieude,chitiettin) VALUES ('','$file_name ','$title','$desc')";
    return mysqli_query($connect, $sql);
}
function selectTypeName($connect)
{
    $sql = "SELECT loaisanpham.* FROM loaisanpham";
    return mysqli_query($connect, $sql);
}
function selectGroupName($connect)
{
    $sql = "SELECT nhomsanpham.* FROM nhomsanpham";
    return mysqli_query($connect, $sql);
}
function createAcc($account, $hashed_password, $connect)
{
    $sql = "INSERT INTO `taikhoan`(`taikhoan`, `matkhau`) VALUES ('$account','$hashed_password')";
    return mysqli_query($connect, $sql);
}
function login($account, $connect)
{
    $sql = "SELECT taikhoan.* FROM taikhoan WHERE taikhoan.taikhoan = '$account'";
    return mysqli_query($connect, $sql);
}
function selectAllProducts($connect)
{
    $sql = "SELECT sanpham.*, loaisanpham.tenloai as tenloai, nhomsanpham.tennhom as tennhom FROM sanpham LEFT JOIN loaisanpham ON loaisanpham.maloai = sanpham.maloai LEFT JOIN nhomsanpham ON nhomsanpham.manhom = loaisanpham.manhom ORDER BY sanpham.create_update DESC";
    return mysqli_query($connect, $sql);
}
function selectNewss($connect)
{
    $select = "SELECT tintuc.* FROM tintuc";
    return mysqli_query($connect, $select);
}
function deleteProduct($id, $connect)
{
    $select = "DELETE FROM `sanpham` WHERE sanpham.masanpham = {$id}";
    return mysqli_query($connect, $select);
}

function updateProduct($id, $name, $price, $color, $detail, $connect)
{
    $select = "UPDATE `sanpham` SET `tensanpham`='$name',`gia`='$price',`mausac`='$color',`mota`='$detail' WHERE sanpham.masanpham  = '$id'";
    return mysqli_query($connect, $select);
}
function selectProductsItems($id, $connect)
{
    $select = "SELECT sanpham.* FROM sanpham WHERE sanpham.masanpham =  {$id}";
    return mysqli_query($connect, $select);
}
function selectIdNewss($id, $connect)
{
    $select = "SELECT tintuc.* FROM tintuc WHERE tintuc.matin = {$id}";
    return mysqli_query($connect, $select);
}
function updateNews($id, $title, $detail, $connect)
{
    $select = "UPDATE `tintuc` SET `tieude`='$title',`chitiettin`='$detail' WHERE tintuc.matin   = '$id'";
    return mysqli_query($connect, $select);
}
function deleteNews($id, $connect)
{
    $select = "DELETE FROM `tintuc` WHERE tintuc.matin  = {$id}";
    return mysqli_query($connect, $select);
}
function selectAccount($connect)
{
    $select = "SELECT taikhoan.* FROM taikhoan ORDER BY taikhoan.create_date DESC";
    return mysqli_query($connect, $select);
}