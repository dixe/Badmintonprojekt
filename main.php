<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css"
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Spilleroversigt</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td> <!-- Hovedindholdet i midten -->
      <div id='content'> 
        <table id='playerlist'>
        </table>
      </div>
    </td>
    <td>
      <div id='buttonPanel'> <!-- Knapperne til hoejre -->
        <form action='addplayer.php'><input type='submit' value='Tilføj spiller' class='button1'></form>
        <form action='editplayer.php'><input type='submit' value='Rediger spiller' class='button1'></form>
        <form action='settings.php'><input type='submit' value='Indstillinger' class='button1'></form>
        <form action='newround.php'><input type='submit' value='Generer runde' id='button2'></form>
      </div>
    </td>
  </tr>
  <tr id='bottombar'>
    <td>
    </td>
    <td>
    <p id='clubname'>Måløv Badminton Club</p>
    </td>
  </tr>
</table>
</center>
</body>
</html>
