<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Indstillinger</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td> 
      <div id='content'> <!-- Hovedindholdet i midten -->
        <table id='settings'>
          <tr>
            <td>
              <form action=settings.php>
                <input type='button' value='Tving ny dag (alle spillere kan matches igen)'>
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <form action=settings.php>
                <input type='button' value='Eksporter spillerdatabase'>
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <form action=settings.php>
                <input type='button' value='Ny sæson'>
              </form>
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td id='buttonPanel'>
      <div id='buttons'>
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