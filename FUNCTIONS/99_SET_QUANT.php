<?php

//PATH
$path=$_SERVER['REQUEST_URI'];
$path=str_replace("main.php","",$path);
$path='/fcr/';
//DATE
$GLOBAL_TODAY=date("Y-m-d H:i:s");

//FIXED VARIABLES
//Maximum number of series in a League
$GLOBAL_NMAX_LGE=8;
//Minimum number of teams in a series
$GLOBAL_NMIN_TEAMS_PER_LGE=4;
//Maximum number of teams in a series
$GLOBAL_NMAX_TEAMS_PER_LGE=20;

//Minimum number of characters for password
$GLOBAL_NMIN_PASS=5;
$GLOBAL_NMAX_PASS=20;
//Minimum number of characters for username
$GLOBAL_NMIN_UNAME=3;
$GLOBAL_NMAX_UNAME=20;
//Minimum number of characters for league name
$GLOBAL_NMIN_LNAME=3;
$GLOBAL_NMAX_LNAME=20;
//Minimum number of characters for series name
$GLOBAL_NMIN_SNAME=3;
$GLOBAL_NMAX_SNAME=20;
//Minimum number of characters for team name
$GLOBAL_NMIN_TNAME=3;
$GLOBAL_NMAX_TNAME=20;

//SET PROPERTIES FOR CAMPIONATO
$GLOBAL_CAMP_METHOD=array("SCONTRI DIRETTI","SCONTRI DIRETTI FP","SOMMA FP");
$GLOBAL_CAMP_HA=array("NO","SI (+2 CASA)","SI (+1 CASA, -1 TRASFERTA)","SI (-2 TRASFERTA)");
//$GLOBAL_CAMP_DFP=array("NO","SI (+2 CASA)","SI (+1 CASA, -1 TRASFERTA)","SI (-2 TRASFERTA)");


//Roles in society
$GLOBAL_ROLES_TEAM=array("Presidente","Presidente-Allenatore","Allenatore","Dirigente","Tifoso");


?>
