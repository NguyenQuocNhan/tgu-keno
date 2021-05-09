<?php

// Bản quy chiếu 10x10 chứa giải thưởng
$banQuyChieu = array(
    array(2000.0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(150.0, 800.0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(8.0, 12.0, 200.0, 0, 0, 0, 0, 0, 0, 0),
    array(0.71, 1.5, 5.0, 40.0, 0, 0, 0, 0, 0, 0),
    array(0.08, 0.15, 0.5, 1.2, 12.5, 0, 0, 0, 0, 0),
    array(0.02, 0.03, 0.05, 0.1, 0.45, 4.4, 0, 0, 0, 0),
    array(0, 0.01, 0.01, 0.02, 0.04, 0.15, 0.4, 0, 0, 0),
    array(0, 0, 0, 0.01, 0.01, 0.01, 0.05, 0.2, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0.01, 0.02, 0.09, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0.02),
    array(0.01, 0.01, 0.01, 0, 0, 0, 0, 0, 0, 0),
);

/**
 * Hàm hiển thị dãy số vừa chọn
 */
function hienThiDaySoVuaChon($daySo){
    // Nếu dãy số lớn hơn 0 hiển thị
    if (count($daySo) > 0){
        echo "<form action='./GameScene.php' method='post'>";
        $index = 1;
        foreach($daySo as $so){
        echo "<tr>";
        echo "<td class='hit'>".$index."</td>";
        echo "<td class='payout'>$so<button name='xoa' value='$so'>x</button></td>";
        echo "</tr>";
        $index++;
        }
        echo "</form>";
    }
}

/**
 * Hàm thêm số vào dãy số đặt cược
 * @param int $so số cần đặt cược
 * @param array &$daySo dãy số đặt cược
 */
function themSo($so, &$daySo){
    if(!in_array($so, $daySo)){
        $daySo[] = $so;
    }
}

/**
 * Hàm xóa số khỏi dãy số
 * @param int $so cần xóa khỏi dãy số
 * @param array $daySo dãy số mà người chơi chọn
 */
function xoaSo($so, &$daySo){
    $pos = array_search($so, $daySo); // tìm vị trí của số trong dãy số
    if($pos > -1 && gettype($pos) != 'boolean'){
        unset($daySo[$pos]); // xóa số khỏi dãy số
    }
}

/**
 * Hàm quay số 
 * @param array &$KetQua mảng chưa dãy số cần quay
 * @param int $n độ dài mảng
 */
function quaySo(&$KetQua, $n){
    $arr = array();
    for($i = 0; $i<$n; $i++){
        do {
            $so = rand(1,80);
        }while (in_array($so, $arr));
        $KetQua[] = $so;
        $arr[]=$so;
    }
}

/**
 * Hàm dò số
 * @param array $nguoiMuaChon bộ số mà người mua chọn
 * @param array $KetQua bộ số quay được
 * @return float số tiền người chơi thắng được
 */
function doSo($nguoiMuaChon, $KetQua){
    global $banQuyChieu;
    $soKetQuaTrung = 0;
    foreach($nguoiMuaChon as $chon){
        if(in_array($chon, $KetQua))
            $soKetQuaTrung++;
    }
    return $banQuyChieu[10-$soKetQuaTrung][10-count($nguoiMuaChon)];
}