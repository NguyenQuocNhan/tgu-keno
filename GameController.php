<?php

$banQuyChieu = array(
    array(2000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(150, 800, 0, 0, 0, 0, 0, 0, 0, 0),
    array(8, 12, 200, 0, 0, 0, 0, 0, 0, 0),
    array(0.71, 1.5, 5, 40, 0, 0, 0, 0, 0, 0),
    array(0.08, 0.15, 0.5, 1.2, 12.5, 0, 0, 0, 0, 0),
    array(0.02, 0.03, 0.05, 0.1, 0.45, 4.4, 0, 0, 0, 0),
    array(0, 0.01, 0.01, 0.02, 0.04, 0.15, 0.4, 0, 0, 0),
    array(0, 0, 0, 0.01, 0.01, 0.01, 0.05, 0.2, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0.01, 0.02, 0.09, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0.02),
    array(0.01, 0.01, 0.01, 0, 0, 0, 0, 0, 0, 0),
);

/**
 * Hàm quay số 
 * @param array mãng kết quả
 */
function quay_so(&$KetQua, $n){
    $arr = array(0,0);
    for($i = 0; $i<$n; $i++){
        do {
            $so = rand(1,80);
        }while (in_array($so, $arr));
        $KetQua[$i] = $so;
        $arr[]=$so;
    }
}

function kiemTraKetQua($nguoiMuaChon, $KetQua){
    global $banQuyChieu;
    print_r($nguoiMuaChon);
    echo "<br>".count($nguoiMuaChon)."<br>";
    $soKetQuaTrung = 0;
    foreach($nguoiMuaChon as $chon){
        if(in_array($chon, $KetQua))
            $soKetQuaTrung++;
    }
    return $banQuyChieu[10-$soKetQuaTrung][10-count($nguoiMuaChon)];
}