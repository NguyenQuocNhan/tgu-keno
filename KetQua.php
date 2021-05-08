<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="ketQua.css">
</head>

<body>
  <?php

  // init var to get infomation
  $ketQua = array();
  $datCuoc = array();

  // setup random
  for ($i = 0; $i < random_int(10, 20); $i++) array_push($ketQua, random_int(1, 80));
  for ($i = 0; $i < random_int(10, 20); $i++) array_push($datCuoc, random_int(1, 80));

  // show KetQua
  echo "<div class='content'>";
  echo "<h1>Kết quả</h1>";
  echo "<div class='result'>";
  for ($i = 0; $i < count($ketQua); $i++) {
    echo "<button>" . $ketQua[$i] . "</button>";
  }
  echo "</div>";

  // show DatCuoc
  echo "<h1>Đặt cược</h1>";
  echo "<div class='hits'>";
  for ($i = 0; $i < count($datCuoc); $i++) {
    if (in_array($datCuoc[$i], $ketQua, true))
      echo "<button class='hit'>" . $datCuoc[$i] . "</button>";
    else echo "<button class='no-hit'>" . $datCuoc[$i] . "</button>";
  }
  echo "</div>";
  echo "</div>";

  echo "<div class='message'>";
  if (checkHit($datCuoc, $ketQua)) {
    echo "<h1 class='happy'>Xin chia buồn bạn đã trúng thưởng <br> Bạn biến ngay đi</h1>";
  } else echo "<h1 class='condolatory'>Chúc mừng bạn đã đặt cược trật lất</h1>";
  echo "</div>";

  function checkHit($datCuoc, $ketQua)
  {
    for ($i = 0; $i < count($datCuoc); $i++) {
      if (in_array($datCuoc[$i], $ketQua, true)) return true;
    }
    return false;
  }

  ?>
</body>

</html>