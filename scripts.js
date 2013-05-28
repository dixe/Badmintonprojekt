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

function sortTable(ind) {
  var table = document.getElementById("playerlist");
  var tableA= new Array();
  var i = 1; //starting at 1 to ignore table header
  while(row = table.rows[i]) {
      tableA[i-1]=row;
      i++;
  }
  if(ind==0) { //sort on player names
    tableA.sort(function(a,b) {
      if(a.cells[0].innerHTML > b.cells[0].innerHTML)
        return 1;
      if(a.cells[0].innerHTML < b.cells[0].innerHTML)
        return -1;
      return 0;
    });
  }
  if(ind==1) { //sort on the primary day, if equal sort on the playername
    tableA.sort(function(a,b) {
      if(a.cells[1].innerHTML > b.cells[1].innerHTML)
        return 1;
      if(a.cells[1].innerHTML < b.cells[1].innerHTML)
        return -1;
      if(a.cells[0].innerHTML > b.cells[0].innerHTML)
        return 1;
      if(a.cells[0].innerHTML < b.cells[0].innerHTML)
        return -1;
      return 0;
    });
  }
  if(ind==2) { //sort on the checkboxes first, if equal sort on the playername
    tableA.sort(function(a,b) {
      if(a.cells[2].firstChild.checked < b.cells[2].firstChild.checked)
        return 1;
      if(a.cells[2].firstChild.checked > b.cells[2].firstChild.checked)
        return -1;
      if(a.cells[0].innerHTML > b.cells[0].innerHTML)
        return 1;
      if(a.cells[0].innerHTML < b.cells[0].innerHTML)
        return -1;
      return 0;
    });
  }
  var i = 0;
  while(i<tableA.length) {
      table.appendChild(tableA[i]);
      i++;
  }
}

//Laver tilfældige runder
function createRandomRounds(playing) {
  for (i= playing.length-1;i>1;i--){
    j= Math.floor(Math.random()*i)
    var tmp =playing[j];
    playing[j]=playing[i];
    playing[i]=tmp;
  return playing;
  }
}

//Vurderer de runder den får som input
function evaluateRounds(rounds) {
  return rounds
}

//Laver en ny runder
function newRound(players,baner) {
  var oversiddere =[];
  var playing = players;
  alert(baner);
  alert(playing.length);
  while (playing.length> baner*4){
    var oversidder =playing[0];
    for(player in playing){
      if(player[8]>oversidder[8] && player[4]=='Y'){
        oversidder=player;
      }
    }
    oversiddere.push(oversidder);
    var index = playing.indexOf(oversidder);
    playing.splice(index,1);
  }
  var rounds = evaluateRounds(createRandomRounds(playing));
  alert(playing);
}

function printRound(id,bane) {
  document.getElementById(id).value = bane;
}

function printRounds(rounds,fordeling) {
  bane = 1;
  if(fordeling=='double') {
    for(i=0; i<rounds.length; i=i+4) { //denne løkkes iteration repræsenterer hver banes opsætning
      printRound(rounds[i],bane+'A');
      printRound(rounds[i+1],bane+'A');
      printRound(rounds[i+2],bane+'B');
      printRound(rounds[i+3],bane+'B');
      bane++;
    }
  }
  else if(fordeling=='single') {
    for(i=0; i<rounds.length; i=i+2) { //denne løkkes iteration repræsenterer hver banes opsætning
      printRound(rounds[i],bane+'A');
      printRound(rounds[i+1],bane+'B');
      bane++;
    }
  }
}

