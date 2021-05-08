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
  <form action="#">
    <div class="main">
      <table class="choice">
        <tr style="background-image: linear-gradient(to right, red, blue); color:white;">
          <td style="border-bottom: 1px solid white; border-right: 2px solid white;">HITS</td>
          <td style="border-bottom: 1px solid white;">PAYOUT</td>
        </tr>
        <?php
        $listNumChoice = [0, 0, 0.5, 0.5, 1, 2, 5, 15, 50, 150, 300, 600, 1200, 2500, 10000];
        for ($i = 0; $i < 15; $i++) {
          echo "<tr>";
          echo "<td class='hit'>" . ($i + 1) . "</td>";
          echo "<td class='payout'>" . $listNumChoice[$i] . "</td>";
          echo "</tr>";
        }
        ?>
      </table>

      <table class="inputNumber">
        <?php
        for ($j = 0; $j < 8; $j++) {
          echo "<tr>";
          for ($i = 0; $i < 10; $i++) {
            echo "<td><button>" . ($j * 10 + $i + 1) . "</button></td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>

  </form>

</html>