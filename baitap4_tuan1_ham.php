<?php
function tim_gia_tri_lon_nhat($arr) {
    return max($arr);
}

function tim_gia_tri_nho_nhat($arr) {
    return min($arr);
}

function tinh_tong($arr) {
    return array_sum($arr);
}

function kiem_tra_ton_tai($value, $arr) {
    return in_array($value, $arr);
}

function sap_xep_mang($arr) {
    sort($arr);
    return $arr;
}
?>