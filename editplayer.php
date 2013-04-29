<?php 
  try {
      $conn = mysqli_connect("localhost", "root", "secretpwD1111", "badminton");
    } catch(Exception $e) {
        print $e->getMessage();
      }

  if(isset($_POST['deletebutton'])) { //Eksisterer kun ved slet command
    $playerid = $_POST['playerid'];
    
    $stmt = $conn->prepare("DELETE FROM players WHERE P_id = ?");                
    $stmt->bind_param('i', $playerid);
    $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
    
    header("Location: main.php");
    die();
  }
  
  if(isset($_POST['playerid'])) { //Eksisterer kun ved en ændring command, når delete ikke var true
    $playerid  = $_POST['playerid'];
    $name      = $_POST['name'];
    $day       = $_POST['day'];
    $strength  = $_POST['strength'];
    $gender    = $_POST['gender'];
    $benchable = $_POST['benchable'];
    $single    = $_POST['single'];
    $played    = $_POST['played'];
    $benched   = $_POST['benched'];

    $stmt = $conn->prepare("UPDATE players " .
                           "SET Name = ?, Strength = ?, Gender = ?, Benchable = ?, " .
                           "Primary_day = ?, Single = ?, Played = ?, Benched = ? " . 
                           "WHERE P_id = ?");
    $stmt->bind_param('sissssiii', $name, $strength, $gender, $benchable, $day, $single, $played, $benched, $playerid);
    $stmt->execute();
    $stmt->close();
    mysqli_close($conn);
   
    header("Location: main.php");
    die();
  }
    
  if(isset($_GET['playerid']) && strlen($_GET['playerid']) > 0) { //Henter alt information om den valgte spiller ud af databasen
    $playerid = $_GET['playerid'];
      
    $stmt = $conn->prepare("SELECT Name, Primary_day, Strength, Gender, " .
                           "Benchable, Single, Played, Benched " .
                           "FROM players " .
                           "WHERE P_id = ?");
    $stmt->bind_param('i', $playerid);
    $stmt->execute();
    $stmt->bind_result($name, $day, $strength, $gender, $benchable, $single, $played, $benched);
    $stmt->fetch();
    $stmt->close();
    mysqli_close($conn);
  }
  else {
    print "Invalid spillerid";
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
    <th><h1>Rediger spiller</h1></th> <!-- Overskrift oeverst -->
  </tr>
  <tr id='innerEdge'>
    <td> 
      <div id='content'> <!-- Hovedindholdet i midten -->
        <form action='editplayer.php' method='post'>
        <input type='hidden' name='playerid' value='<?php print $playerid; ?>'>
        <table id='edittable'>
          <tr>
            <th>Navn</th><td><input type='text' name='name' value='<?php print $name; ?>'></td>
          </tr>
          <tr>
            <th>Primær Spilleaften</th>
            <td>
              <select name='day' selected=''>
                <option value='Torsdag' <?php if($day == 'Torsdag') { print 'Selected'; } ?>>Torsdag</option>
                <option value='Onsdag' <?php if($day == 'Onsdag') { print 'Selected'; } ?>>Onsdag</option>
                <option value='Mandag' <?php if($day == 'Mandag') { print 'Selected'; } ?>>Mandag</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Styrke</th>
            <td>
              <select name='strength'>
                <option value='1' <?php if($strength == '1') { print 'Selected'; } ?>>1</option>
                <option value='2' <?php if($strength == '2') { print 'Selected'; } ?>>2</option>
                <option value='3' <?php if($strength == '3') { print 'Selected'; } ?>>3</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Køn</th>
            <td>
              <select name='gender'>
                <option value='M' <?php if($gender == 'M') { print 'Selected'; } ?>>Mand</option>
                <option value='F' <?php if($gender == 'F') { print 'Selected'; } ?>>Kvinde</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Kan være oversidder</th>
            <td>
              <select name='benchable'>
                <option value='Y' <?php if($benchable == 'Y') { print 'Selected'; } ?>>Ja</option>
                <option value='N' <?php if($benchable == 'N') { print 'Selected'; } ?>>Nej</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Kan spille single</th>
            <td>
              <select name='single'>
                <option value='Y' <?php if($single == 'Y') { print 'Selected'; } ?>>Ja</option>
                <option value='N' <?php if($single == 'N') { print 'Selected'; } ?>>Nej</option>
              </select>
            </td>
          </tr>
          <tr></tr><tr></tr><tr></tr>
          <tr>
            <th>Antal runder spillet</th><td><input type='text' name='played' value='<?php print $played; ?>'></td>
          </tr>
          <tr>
            <th>Antal runder oversiddet</th><td><input type='text' name='benched' value='<?php print $benched; ?>'></td>
          </tr>
        </table>
      </div>
    </td>
    <td>
      <div id='buttons'>
        <input id='editbutton' type='submit' value='Gem ændringer'></form>
        <form action='editplayer.php' method='post'>
          <input type='hidden' name='playerid' value='<?php print $playerid; ?>'>
          <input id='deletebutton' name='deletebutton' type='submit' value='Slet spiller'>
        </form>
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
