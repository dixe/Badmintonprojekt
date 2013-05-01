//Tillader markering af spillere i main.php tabellen så den valgte spiller kan redigeres
var highlighted = null;
function highlightRow(Row) {
  if (highlighted != null) { highlighted.style.backgroundColor="lightgrey"; }
  highlighted = Row;
  Row.style.backgroundColor="rgb(162,162,162)";
  
  var playerid = Row.getElementsByTagName("input")[0].value;
  document.getElementById("playerid").value=playerid;
  document.getElementById("editsubmit").type="submit"; //gør at 'rediger spiller' knappen virker
}

//Tillader søgning på spillernavne i main.php tabellen
function search() {
  var searchText = document.getElementById("searchText").value;
  var playerTable = document.getElementById("playerlist");
  var i = 1;
  while(row = playerTable.rows[i++]) {
    var playerName = row.cells[0].innerHTML;
    if(playerName.toLowerCase().indexOf(searchText.toLowerCase())<0) {
      row.style.display="none";
    }
    else {
      row.style.display="";
    }
  }
}