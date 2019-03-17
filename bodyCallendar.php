
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>


table { 
	width: 100%; 
	border-collapse: collapse; 
	margin:50px auto;
    table-layout: auto;
    
    
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: black; 
	color: white; 
	font-weight: bold; 
    font-size: 12px;
	}

td, th { 
	padding: 2px; 
	border: 1px solid #ccc; 
	text-align: left;  
    width: 200px;
    overflow: hidden;

    white-space: nowrap;
	}

td{
        font-size: 9px;
       
    }
.small{
        width:2%;
    }

    
.caseBloque{
        
        width:20px;
        
    }
.col-sm-3{
        height:18px;
        width:10px;
        
    }
}
</style>
<?php




/* draws a calendar */
function draw_calendar(){
    
    $year =  date("Y");
    $monthCurrent = date("m");
    $monthNext1 = date("m", strtotime('+1 month'));
    $monthNext2 = date("m", strtotime('+2 month'));
    $monthNext3 = date("m", strtotime('+3 month'));
    $monthNext4 = date("m", strtotime('+4 month'));
    $monthNext5 = date("m", strtotime('+5 month'));

    $monthCurrentStr = date("M");
    $monthNext1Str = date("M", strtotime('+1 month'));
    $monthNext2Str = date("M", strtotime('+2 month'));
    $monthNext3Str = date("M", strtotime('+3 month'));
    $monthNext4Str = date("M", strtotime('+4 month'));
    $monthNext5Str = date("M", strtotime('+5 month'));


    $numberofday1 = cal_days_in_month(CAL_GREGORIAN,$monthCurrent , $year);
    $numberofday2 = cal_days_in_month(CAL_GREGORIAN,$monthNext1 , $year);
    $numberofday3 = cal_days_in_month(CAL_GREGORIAN,$monthNext2 , $year);
    $numberofday4 = cal_days_in_month(CAL_GREGORIAN,$monthNext3 , $year);
    $numberofday5 = cal_days_in_month(CAL_GREGORIAN,$monthNext4 , $year);
    $numberofday6 = cal_days_in_month(CAL_GREGORIAN,$monthNext5 , $year);

    
	/* draw table */
    $calendar = '<table cellpadding="0" cellspacing="2" style="width:100%;" class="calendar"><thead>';
    $calendar.= '<tr>';
    $calendar.= '<th colspan="3"> <center>'.$monthCurrentStr.'</center> </th>';
    $calendar.= '<th colspan="3"> <center>'.$monthNext1Str.'</center> </th>';
    $calendar.= '<th colspan="3"> <center>'.$monthNext2Str.'</center> </th>';
    $calendar.= '<th colspan="3"> <center>'.$monthNext3Str.'</center> </th>';
    $calendar.= '<th colspan="3"> <center>'.$monthNext4Str.'</center> </th>';
    $calendar.= '<th colspan="3"> <center>'.$monthNext5Str.'</center> </th>';
    
   

	
	/* final row */
    $calendar.= '</tr></head>'; 
    $calendar.= '<tbody><tr>';
    // for($i = 1 ,$j = 1 ,$k = 1 ; $i <= $numberofday1, $j = $numberofday2, $k <= $numberofday3 ; $i++, $j++, $k++)
    $i = 0 ;
    $j = 0;
    $k = 0;
    $i1 = 0 ;
    $j1 = 0;
    $k1 = 0;
    $u = 0;

    
    while( $i <= $numberofday1 || $j <= $numberofday2 || $k <= $numberofday3 || $i1 <= $numberofday4 || $j1 <= $numberofday5 || $k1 <= $numberofday6 )
    {   $i++;
        $j++;
        $k++;
        $i1++;
        $j1++;
        $k1++;
        $myDay = 0;
        $u=0;
        if($i <= $numberofday1 ){

            //Verification des jours feries

            $todayCheckHoliday1 = mktime(0, 0, 0, $monthCurrent, $i,  $year); 
            $today1 = unixtojd(mktime(0, 0, 0, $monthCurrent, $i,  $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);
            //$todayCheckHoliday = new DateTime($year.'-'.$monthCurrent.'-'.$i.' 00:00:00');
            // echo $holidays[1];
            // echo $todayCheckHoliday;
            
  
            //////////////////////////////////////////////////
            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")){ $color = "gray";}
            else {$color = "";}

            $calendar.= '<td class="small" > '.$i.' </td>';
            $calendar.= '<td class="small" > '.$today["abbrevdayname"].' </td>';  
            $calendar.= '<td class="caseBloque" id="'.$year.'-'.$monthCurrent.'-'.$i.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthCurrent.'-'.$i.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthCurrent.'-'.$i.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-2"></div></div></td>';
            
        }

        else{

            $calendar.= '<td class="small" style="background-color:'.$color.'" ></td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td style="">  </td>';
        }

        if($j <= $numberofday2 ){

            $todayCheckHoliday1 = mktime(0, 0, 0, $monthNext1, $j,  $year);
            $todayCheckHoliday = new DateTime($year.'-'.$monthNext1.'-'.$j.' 00:00:00');

            $today1 = unixtojd(mktime(0, 0, 0, $monthNext1,$j, $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);

            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")){ $color = "gray";}
            else {$color = "";}


            $calendar.= '<td class="small" style="" > '.$j.' </td>';
            $calendar.= '<td class="small" style=""> '.$today["abbrevdayname"].' </td>';
            $calendar.= '<td class="caseBloque" id="'.$year.'-'.$monthNext1.'-'.$j.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext1.'-'.$j.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-1"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext1.'-'.$j.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-2"></div></div></td>';
            
        }
        else{

            $calendar.= '<td class="small" style="background-color:" ></td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td style="">  </td>';
        }
        if($k <= $numberofday3 ){

            $today1 = unixtojd(mktime(0, 0, 0,$monthNext2, $k,  $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);

            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")) { $color = "gray";}
            else {$color = "";}

            $calendar.= '<td class="small" style="" > '.$k.' </td>';
            $calendar.= '<td class="small" style=""> '.$today["abbrevdayname"].' </td>';
            $calendar.= '<td class="caseBloque" id="'.$year.'-'.$monthNext2.'-'.$k.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext2.'-'.$k.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-1"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext2.'-'.$k.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div  class="col-sm-2"></div></div></td>';
           
        }
        else{
            $calendar.= '<td class="small" style="background-color:#d1d2d3" ></td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td style=""></td>';
        }
        if($i1 <= $numberofday4 ){

            $today1 = unixtojd(mktime(0, 0, 0,$monthNext3, $i1,  $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);

            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")){ $color = "gray";}
            else {$color = "";}

            $calendar.= '<td class="small" style="" > '.$i1.' </td>';
            $calendar.= '<td class="small" style=""> '.$today["abbrevdayname"].' </td>';  
            $calendar.= '<td class="caseBloque" id="'.$year.'-'.$monthNext3.'-'.$i1.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext3.'-'.$i1.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-1"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext3.'-'.$i1.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div  class="col-sm-2"></div></div></td>';
          
        }
        else{
            $calendar.= '<td class="small" style="" >  </td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td style="">  </td>';
        }
        if($j1 <= $numberofday5 ){

            $today1 = unixtojd(mktime(0, 0, 0,$monthNext4, $j1,  $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);

            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")){ $color = "gray";}
            else {$color = "";}

            $calendar.= '<td class="small" style="" > '.$j1.' </td>';
            $calendar.= '<td class="small" style=""> '.$today["abbrevdayname"].' </td>';
            $calendar.= '<td class="caseBloque" id="'.$year.'-'.$monthNext4.'-'.$j1.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext4.'-'.$j1.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-1"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext4.'-'.$j1.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-2"></div></div></td>';
            
        }
        else{

            $calendar.= '<td class="small" style="" >  </td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td style="">  </td>';
        }
        if($k1 <= $numberofday6 ){

            $today1 = unixtojd(mktime(0, 0, 0,$monthNext5, $k1,  $year));
            $today = cal_from_jd($today1, CAL_GREGORIAN);

            if(($today["abbrevdayname"] == "Sun") || ($today["abbrevdayname"] == "Sat")){ $color = "gray";}
            else {$color = "";}

            $calendar.= '<td class="small" style="" > '.$k1.' </td>';
            $calendar.= '<td class="small" style=""> '.$today["abbrevdayname"].' </td>';
            $calendar.= '<td class="caseBloque"  id="'.$year.'-'.$monthNext5.'-'.$k1.'" style="background-color:'.$color.'" onclick="myEvent(this)">';
            $calendar.= '<div class="row"><div class="col-sm-2"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext5.'-'.$k1.':1" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-1"></div>';
            $calendar.= '<div id="'.$year.'-'.$monthNext5.'-'.$k1.':2" class="col-sm-3" onclick="getVacation(this)"></div>';
            $calendar.= '<div class="col-sm-2"></div></div></td>';
            
        }
        else{
            
            $calendar.= '<td class="small" style="background-color:'.$color.'" >  </td>';
            $calendar.= '<td class="small" style="">  </td>';
            $calendar.= '<td  style="">  </td>';
        }

    

   
    $calendar.= '</tr>';
    }
    

   
	
	/* final row */
    $calendar.= '</tr>';
    


	/* end the table */
	$calendar.= '</tbody></table>';
	
	/* all done, return result */
	return $calendar;
}

/* sample usages */

// echo draw_calendar();?>
<script>
function myEvent(a)
{ 
    alert("a.id");

}
function getVacation(b){
    alert(b.id);
   
}
var col = document.getElementById("2019-05-13:1");
col.style.backgroundColor = "#1e4f49";
var col = document.getElementById("2019-05-14:1");
col.style.backgroundColor = "#1e4f49";
var col = document.getElementById("2019-05-15:1");
col.style.backgroundColor = "#1e4f49";
var col = document.getElementById("2019-05-16:1");
col.style.backgroundColor = "#1e4f49";
var col = document.getElementById("2019-05-17:1");
col.style.backgroundColor = "#1e4f49";
var col = document.getElementById("2019-04-8:2");
col.style.backgroundColor = "#552dbc";
var col = document.getElementById("2019-04-9:2");
col.style.backgroundColor = "#552dbc";
var col = document.getElementById("2019-04-10:2");
col.style.backgroundColor = "#552dbc";
var col = document.getElementById("2019-04-11:2");
col.style.backgroundColor = "#552dbc";
var col = document.getElementById("2019-04-12:2");
col.style.backgroundColor = "#552dbc";


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

