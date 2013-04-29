<?php
    function do_alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$Name=$_POST['name'];
$Day=$_POST['day'];
$Styrke=$_POST['styrke'];
$Gender=$_POST['gender'];
$Oversidder=$_POST['oversidder'];
$Single=$_POST['single'];

if(strlen($Name)==0){
  header("Location: addplayer.php");
  die();
}
try{
  $con = mysqli_connect("localhost","root","secretpwD1111","badminton");
  if($stmt = $con->prepare('INSERT INTO players values("",?,?,?,?,?,?,0,0)')){
    $stmt->bind_param('sissss',$Name,$Styrke,$Gender,$Oversidder,$Day,$Single);
    $stmt->execute();
    $stmt->close();
  }
  mysqli_close($con);

}catch(exception $e) {
  print $e->getMessage();
}
header("Location: main.php");
die();
}
?>
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
              </select>
            </td>
          </tr>
          <tr>
            <th>Køn</th>
            <td>
              <select name='gender'>
                <option value='M'>Mand</option>
                <option value='F'>Kvinde</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Kan være oversidder</th>
            <td>
              <select name='oversidder'>
                <option value='Y'>ja</option>
                <option value='N'>nej</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Kan spille single</th>
            <td>
              <select name='single'>
                <option value='Y'>ja</option>
                <option value='N'>nej</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td>
      <div id='buttons'>
        <input id='addbutton' type='submit' value='Tilføj spiller'></form>
        <form action='main.php'><input  id='backbutton' type='submit'
                                       value='Tilbage'></form>
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
