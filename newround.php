<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Banegenerering</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td>
      <div id='content'> <!-- Hovedindholdet i midten -->
        <table id='baner'>
          <?php
            if (isset($_POST['deltagere']) && isset($_POST['baner'])) {
              $deltagere = $_POST['deltagere'];
              $baner = $_POST['baner'];
              foreach($deltagere as $deltager) {
                print "<tr><td>" . $deltager . "</td><tr>";
              }
              print "antal baner:" . $baner;
              print "<script>"; // laver array med spiller info fra databasen som bruges til at genere
              print "var players = []";
              print "</script>";
            }
          ?>
        </table>
      </div>
    </td>
    <td id='buttonPanel'>
      <div id='buttons'>
        <button onclick='newRound(players)' id='newRoundButton'>Ny runde</button>
        <form action='newround.php'><input id='useRoundButton' type='submit' value='Anvend runde'></form>
        <form action='main.php'><input id='backbutton' type='submit' value='Tilbage'></form>
      </div>
    </td>
  </tr>
  <tr id='bottombar'>
    <td>
    </td>
    <td>
      Måløv Badminton Club
    </td>
  </tr>
</table>
</center>
</body>
</html>