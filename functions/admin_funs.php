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