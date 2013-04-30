<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
var highlighted = null;
function highlightRow(Row) {
  if (highlighted != null) { highlighted.style.backgroundColor="lightgrey"; }
  highlighted = Row;
  Row.style.backgroundColor="rgb(162,162,162)";
  
  var playerid = Row.getElementsByTagName("input")[0].value;
  document.getElementById("editform").action="editplayer.php";
  document.getElementById("playerid").value=playerid;
  document.getElementById("playerid").name="playerid";
}
</script>
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Spilleroversigt</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td>
      <div id='content'> <!-- Hovedindholdet i midten -->
        <form action='newround.php' method='post'>
        <p id='fieldCount'>Antal baner:
          <select name='baner'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
          </select>
        </p>
        <table id='playerlist'>
          <tr><th id='spiller'>Spiller</th><th>Deltagende</th></tr>
          <!-- Spillerliste start -->
          <?php
            try {
              $conn = mysqli_connect("localhost", "root", "secretpwD1111", "badminton");
                } catch(Exception $e) {
                    print $e->getMessage();
                  }
                  
            $SQLresult = mysqli_query($conn, "SELECT P_id, Name FROM players");
            
            while($row = mysqli_fetch_array($SQLresult)) {
            print "<tr onclick='highlightRow(this)'>" . 
                      "<td>" . $row[1] . "</td>" .
                      "<td><input type='checkbox' name='deltagere[]' value ='" . $row[0] . "'></td>" .
                    "</tr>";
            }
            mysqli_close($conn);
          ?>
        </table>
      </div>
    </td>
    <td id='buttonPanel'>
      <div id='buttons'> <!-- Knapperne til hoejre -->
        <input type='submit' value='Generer runde' id='button2'></form>
        <form action='addplayer.php'><input type='submit' value='Tilf�j spiller' class='button1'></form>
        <form action='' id='editform'><input type='hidden' name='' id='playerid' value=''><br><input type='submit' value='Rediger spiller' class='button1'></form><br>
        <form action='settings.php'><input type='submit' value='Indstillinger' class='button1'></form>
      </div>
    </td>
  </tr>
  <tr id='bottombar'>
    <td>
    </td>
    <td>
      M�l�v Badminton Club
    </td>
  </tr>
</table>
</center>
</body>
</html>
