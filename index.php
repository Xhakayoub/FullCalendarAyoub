<?php
include 'bodyCallendar.php';

echo draw_calendar();

?>

<script>
function myEvent(a)
{ 
    alert("a.id");

}
function getVacation(b){
    location.href = "www.yoursite.com";
   
}
var col = document.getElementById("2019-05-13:1");
col.style.backgroundColor = "#9e8066";
var col = document.getElementById("2019-05-14:1");
col.style.backgroundColor = "#9e8066";
var col = document.getElementById("2019-05-15:1");
col.style.backgroundColor = "#9e8066";
var col = document.getElementById("2019-05-16:1");
col.style.backgroundColor = "#9e8066";
var col = document.getElementById("2019-05-17:1");
col.style.backgroundColor = "#9e8066";
var col = document.getElementById("2019-04-8:2");
col.style.backgroundColor = "#6a96a3";
var col = document.getElementById("2019-04-9:2");
col.style.backgroundColor = "#6a96a3";
var col = document.getElementById("2019-04-10:2");
col.style.backgroundColor = "#6a96a3";
var col = document.getElementById("2019-04-11:2");
col.style.backgroundColor = "#6a96a3";
var col = document.getElementById("2019-04-12:2");
col.style.backgroundColor = "#6a96a3";


var holidays = { // keys are formatted as month,week,day
    "Premier de l'An": "2019-01-1",
    "Epiphanie": "2019-01-6",
    "Saint Valentin": "2019-02-14",
    "Mardi Gras": "2019-03-5",
    "Pâques": "2019-04-21",
    "Diamanche de Pâques": "2019-04-21",
    "Lundi de Pâques": "2019-04-22",
    "Fête du travail": "2019-05-1",
    "Victoire 1945": "2019-05-8",
    "Ascension": "2019-05-30",
    "Pentecôte": "2019-06-9",
    "Dimanche de Pentecôte": "2019-06-9",
    "Lundi de Pentecôte": "2019-06-10",
    "Fête Nationale": "2019-07-14",
    "Assomption": "2019-08-15",
    "Toussaint": "2019-11-1",
    "Armistice": "2019-11-11",
    "Nôel": "2019-12-25",
    "Saint-Sylvestre": "2019-12-31",
    
   
};

for (var day in holidays) 
{
    var id = holidays[day];
    console.log(id);
    console.log(day);
    var td = document.getElementById(id);
    if(td == null){ var i=0;}
    else{
    td.style.backgroundColor = "#a2ad7c";
    td.textContent= day;}
}
     
 
 
   


//for(var i=0; i<=holidays.lenght; i++)
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";
// document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";document.getElementById(holidays["Pâques"]).style.backgroundColor = "#a2ad7c";

//doc.style.backgroundColor = "#a2ad7c";
</script>
