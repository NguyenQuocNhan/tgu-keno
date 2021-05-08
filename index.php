
<?php
@include "./GameController.php";
@include "./Test.php";


$KetQua = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

quay_so($KetQua, 20);
//$KetQua = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);


foreach($KetQua as $so){
    echo $so."&nbsp;";
}

// Xuất form chọn số
echo "<form action='./index.php' method='post'>";
for ($i = 0;$i<10; $i++){
    echo "<input type='number' name='so_$i' id='so_$i'/>";
}
echo "<br>"."<input type='submit' value='submit'>";
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Biến lưu dải số người chơi chọn
    $nguoiMuaChon = array();
    for ($i = 0;$i<10; $i++){
        if($_POST["so_$i"] != null)
            $nguoiMuaChon[] = $_POST["so_$i"];
    }
    echo "<br>"."Số tiền bạn trúng là: ".kiemTraKetQua($nguoiMuaChon, $KetQua)*1000000;
}
?>

