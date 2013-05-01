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
  var i = 1;//starting at 1 to ignore table header
  while(row = table.rows[i]) {
      tableA[i-1]=row;
      i++;
  }
  if(ind==1){
    tableA.sort(function(a,b){    
      if(a.cells[1].firstChild.checked && b.cells[1].firstChild.checked){
        return 0
      }
      if(a.cells[1].firstChild.checked && !b.cells[1].firstChild.checked){
        return -1
      }
      if(!a.cells[1].firstChild.checked && b.cells[1].firstChild.checked){
        return 1;
      } 
    
    });
  }else{    
    var i, j, tmp, tmp2;
    for (i = 0; i < tableA.length - 1; i++)
    {
        tmp = i;
        for (j = i + 1; j < tableA.length; j++){
            if (tableA[j].cells[0].innerHTML < tableA[tmp].cells[0].innerHTML){
                tmp = j;
              }
        } 
        tmp2 = tableA[tmp];
        tableA[tmp] = tableA[i];
        tableA[i] = tmp2;
    }
  }

  var i = 0;
  while ( table.rows.length > 1)
   {
    table.deleteRow(1);
  }
  while(i<tableA.length) {   
      table.appendChild(tableA[i]);
      i++;
  }
}