<!DOCTYPE html>
<html>
<header>
<link rel="stylesheet" type="text/css" href="style.css">
</header>
<body>
<center>
<table id='mainframe'>
  <tr>
    <th><h1>Tilføj spiller</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td> 
      <div id='content'> <!-- Hovedindholdet i midten -->
        <form action='addplayer.php' method='post'>
        <table id='addtable'>
          <tr>
            <th>Navn</th><td><input type='text' name='name'></td>
          </tr>
          <tr>
            <th>Primær Spilleaften</th>
            <td>
              <select name='day'>
                <option value='Torsdag'>Torsdag</option>
                <option value='Onsdag'>Onsdag</option>
                <option value='Mandag'>Mandag</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Styrke</th>
            <td>
              <select name='styrke'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Køn</th>
            <td>
              <select name='gender'>
                <option value='male'>Mand</option>
                <option value='female'>Kvinde</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Kan være oversidder</th>
            <td>
              <select name='oversidder'>
                <option value='yes'>ja</option>
                <option value='no'>nej</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td>
      <div id='buttons'>
        <input id='addbutton' type='submit' value='Tilføj spiller'></form>
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
