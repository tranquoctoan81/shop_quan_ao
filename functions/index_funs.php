<?php
function getMenuType($id, $connect)
{
    $select = "SELECT loaisanpham.*, nhomsanpham.tennhom as tennhom FROM loaisanpham LEFT JOIN nhomsanpham ON nhomsanpham.manhom = loaisanpham.manhom WHERE nhomsanpham.manhom = {$id}";
    return mysqli_query($connect, $select);
}
function getMenuGroup($connect)
{
    $select = "SELECT nhomsanpham.* FROM nhomsanpham";
    return mysqli_query($connect, $select);
}
function selectHotProduct($connect)
{
    $select = "SELECT sanpham.* FROM sanpham WHERE sanpham.maloai IN('1','2','3','4','5','7','8') LIMIT 12";
    return mysqli_query($connect, $select);
}
function selectNewProduct($connect)
{
    $select = "SELECT sanpham.* FROM sanpham WHERE sanpham.maloai = 6 LIMIT 4";
    return mysqli_query($connect, $select);
}
function selectNews($connect)
{
    $select = "SELECT tintuc.* FROM tintuc LIMIT 3";
    return mysqli_query($connect, $select);
}
function selectAllNews($connect)
{
    $select = "SELECT tintuc.* FROM tintuc";
    return mysqli_query($connect, $select);
}
function selectIdNews($id, $connect)
{
    $select = "SELECT tintuc.* FROM tintuc WHERE tintuc.matin = {$id}";
    return mysqli_query($connect, $select);
}
function selectProductsMenu($id, $connect)
{
    $select = "SELECT sanpham.* FROM sanpham WHERE sanpham.maloai = {$id}";
    return mysqli_query($connect, $select);
}
function selectNameTypeItem($id, $connect)
{
    $select = "SELECT loaisanpham.tenloai FROM loaisanpham WHERE loaisanpham.maloai =  {$id}";
    return mysqli_query($connect, $select);
}
function selectNameTypeItem2($id, $connect)
{
    $select = "SELECT loaisanpham.tenloai FROM loaisanpham LEFT JOIN sanpham ON loaisanpham.maloai = sanpham.maloai WHERE sanpham.masanpham =  {$id}";
    return mysqli_query($connect, $select);
}
function selectProductsItem($id, $connect)
{
    $select = "SELECT sanpham.* FROM sanpham WHERE sanpham.masanpham =  {$id}";
    return mysqli_query($connect, $select);
}
function searchProduct($name, $connect)
{
    $select = "SELECT sanpham.* From sanpham WHERE sanpham.tensanpham LIKE '%$name%'";
    return mysqli_query($connect, $select);
}