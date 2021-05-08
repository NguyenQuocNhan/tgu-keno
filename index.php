<?php

//run sesstion
session_start();

// Khởi tạo mảng các số người chơi chọn
$_SESSION["soNguoiChon"] = array();

?>

<form action="./GameScene.php" method="post">
  <button type="submit">Play Game</button>
</form>