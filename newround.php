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
          <tr><th>1. Bane:</th><td>Navn 1, Navn 2 vs Navn 3, Navn 4</td></tr>
          <tr><th>2. Bane:</th><td>Navn 1, Navn 2 vs Navn 3, Navn 4</td></tr>
          <tr><th>3. Bane:</th><td>Navn 1, Navn 2 vs Navn 3, Navn 4</td></tr>
          <tr><th>4. Bane:</th><td>Navn 1, Navn 2 vs Navn 3, Navn 4</td></tr>
          <tr><th>Oversiddere:</th><td>Navn 5, Navn 6, Navn 7</td></tr>
        </table>
      </div>
    </td>
    <td>
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
