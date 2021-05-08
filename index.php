<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>What are you doing???</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <h1 class="title">KENO</h1>

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
// echo "<form action='./index.php' method='post'>";
// for ($i = 0;$i<10; $i++){
//     echo "<input type='number' name='so_$i' id='so_$i'/>";
// }
// echo "<br>"."<input type='submit' value='submit'>";
// echo "</form>";

echo "<form action='./index.php' method='post'>";
echo "<div class='main'>";
echo "<table class='choice'>";
echo "
    <tr style='background-image: linear-gradient(to right, red, blue); color:white;'>
      <td style='border-bottom: 1px solid white; border-right: 2px solid white;'>HITS</td>
      <td style='border-bottom: 1px solid white;'>PAYOUT</td>
    </tr>";

    $listNumChoice = [0, 0, 0.5, 0.5, 1, 2, 5, 15, 50, 150, 300, 600, 1200, 2500, 10000];
    for ($i = 0; $i < 15; $i++) {
      echo "<tr>";
      echo "<td class='hit'>" . ($i + 1) . "</td>";
      echo "<td class='payout'>" . $listNumChoice[$i] . "</td>";
      echo "</tr>";
    }
echo "</table>";

echo "<table class='inputNumber'>";
    for ($j = 0; $j < 8; $j++) {
      echo "<tr>";
      for ($i = 0; $i < 10; $i++) {
        echo "<td><button>" . ($j * 10 + $i + 1) . "</button></td>";
      }
      echo "</tr>";
    }
echo "<button type='submit'>Submit</button>";
echo "</table>
</div>
</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Biến lưu dải số người chơi chọn
    $nguoiMuaChon = array();
    for ($i = 0;$i<10; $i++){
        if($_POST["so_$i"] != null)
            $nguoiMuaChon[] = $_POST["so_$i"];
    }
    $final = kiemTraKetQua($nguoiMuaChon, $KetQua);
    if ($final > 0)
        echo "<br>"."Số tiền bạn trúng là: ".$final*1000000;
    else 
        echo "<br>"."Chúc mừng bạn đã trúng... gió";
}
?>

</body>

