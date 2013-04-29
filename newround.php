<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Banegenerering:</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td> 
      <div id='content'> <!-- Hovedindholdet i midten -->
        <table id='baner'>
          <?php 
            $deltagere = $_POST['deltagere'];
          
            foreach($deltagere as $deltager) {
              print "<tr><td>" . $deltager . "</td><tr>";
            }
          ?>
        </table>
      </div>
    </td>
    <td id='buttonPanel'>
      <div id='buttons'>
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