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
    <th><h1>Spilleroversigt</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td>
      <div id='content'> <!-- Hovedindholdet i midten -->
        <span id='search'>
          <input type='text' id='searchText' onkeydown='if(event.keyCode == 13) search()'>
          <input type='button' onclick='search()' value='Søg'>
        </span>
        <form action='newround.php' method='post'>
        <span id='fieldCount'>
          Antal baner:
          <select name='baner'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
          </select>
        </span>
        <table id='playerlist'>
          <tr><th onclick="sortTable(0)" id='spiller'>Spiller</th><th onclick="sortTable(1)">Dag</th><th onclick="sortTable(2)">Deltagende</th></tr>
          <!-- Spillerliste start -->
          <?php
            try {
              $conn = mysqli_connect("localhost", "root", "secretpwD1111", "badminton");
                } catch(Exception $e) {
                    print $e->getMessage();
                  }

            $SQLresult = mysqli_query($conn, "SELECT P_id, Name, Primary_day FROM players");

            while($row = mysqli_fetch_array($SQLresult)) {
            print "<tr onclick='highlightRow(this)'>" .
                      "<td>" . $row[1] . "</td>" .
                      "<td>" . $row[2] . "</td>" .
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
        <input type='submit' value='Rundegenerering' id='button2'></form>
        <form action='addplayer.php'><input type='submit' value='Tilføj spiller' class='button1'></form>
        <form action='editplayer.php'><input type='hidden' name='playerid' id='playerid' value=''><input type='button' value='Rediger spiller' class='button1' id='editsubmit'></form>
        <form action='settings.php'><input type='submit' value='Indstillinger' class='button1'></form>
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