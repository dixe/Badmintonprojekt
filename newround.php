<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="scripts.js"></script>
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
              try {
              $conn = mysqli_connect("localhost", "root", "secretpwD1111", "badminton");
                } catch(Exception $e) {
                    print $e->getMessage();
                  }
              print "<script>"; // laver array med spiller info fra databasen som bruges til at genere
              print "var baner = $baner;";
              print "var players = [];";
              print "</script>";
              if($stmt =$conn->prepare("SELECT * FROM players where p_id=?")) {
                foreach($deltagere as $deltager) {
                  $stmt->bind_param("i",$deltager);
                  $stmt->execute();
                  $stmt->bind_result($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                  $stmt->fetch();
                  print "<script>";
                  print "players.push([$row[0],'$row[1]',$row[2],'$row[3]','$row[4]','$row[5]','$row[6]',$row[7],$row[8]])";
                  print "</script>";
                  print "<tr>" .
                          "<td>" . $row[1] . "</td>" .
                          "<td><input type='text' id='" . $row[0] . "' class='bane'></td>" .
                        "</tr>";
                }
              }
            }
          ?>
        </table>

      </div>
      <form action='main.php'><input type='submit' value='Tilbage'></form>
    </td>
    <td id='buttonPanel'>
      <div id='buttons'>
        <button onclick='newRound(players,baner)' id='newRoundButton'>Ny runde</button>
        <form action='newround.php'><input id='useRoundButton' type='submit' value='Anvend runde'></form>

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