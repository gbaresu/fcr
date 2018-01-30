<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");
require_once(dirname(__FILE__)."/../CLASSES/00_LGN_CLASSES.php");
require_once(dirname(__FILE__)."/../CLASSES/02_USR_CLASSES.php");
require_once(dirname(__FILE__)."/../CLASSES/03_TMS_CLASSES.php");
require_once(dirname(__FILE__)."/../FUNCTIONS/99_SET_QUANT.php");
require_once(dirname(__FILE__)."/../FUNCTIONS/03_SYS_FUNCTIONS.php");


if($_POST["func"]=="new_lge_create"){
	global $GLOBAL_TODAY;global $user_class;global $uind_class;
	$sessione = new Sessione();	
	
	$db=getDB();
	
	$new_id_series=array();
	
	$today=$GLOBAL_TODAY;
	
	$usr=$_SESSION["username"];
	$id_creator=GET_USR_ID($usr);
	//Collect values
	$lge_name=$_POST["lge_name"];
	$nser=$_POST["nser"];
	$snumber=$_POST["snumber"];
	$spar=$_POST["spar"];
	$sname=$_POST["sname"];
	$slev=$_POST["slev"];
	$team=$_POST["team"];
	$nisc=$_POST["nisc"];
	//Total partecipants
	$ntot=0;
	for($i=1;$i<=$nser;$i++){
		$ntot+=$spar[$i];
	}
	//GET new ID
	$maxid_lge=GET_MAX_ID("00_LEAGUES","ID_LEAGUE");
	$new_id_lge=$maxid_lge+1;
	if($maxid_lge=="") $new_id_lge=1;
	
	//Query -> add line in league table
	$q="insert into 00_LEAGUES (NAME,ID_LEAGUE,ID_CREATOR,PARTS,DATE) values 
		('".$lge_name."',".$new_id_lge.",".$id_creator.",".$ntot.",'".$today."')";
	mysqli_query($db,$q);	
	
	//Query -> add lines for each series in series table
	for($i=1;$i<=$nser;$i++){
		$max_id_series=GET_MAX_ID("01_LEAGUES_DETAIL","ID_LEAGUE");
		$new_id_series[$i]=$max_id_series+$i;
		$code=GET_LGE_CODE($id_creator,$new_id_lge,$new_id_series);
		$q="insert into 01_LEAGUES_DETAIL (ID_SERIES,ID_PARENT,NAME,PARTS,LEVEL,CODE_AN,DATE) values 
		(".$new_id_series[$i].",".$new_id_lge.",'".$sname[$i]."',".$spar[$i].",".$slev[$i].",'".$code."','".$GLOBAL_TODAY."')";
		mysqli_query($db,$q);
	}
	//Query -> add line for team in team table [by default this is the def league and use league, plus user is admin]
	$maxid_team=GET_MAX_ID("03_LEAGUES_TEAMS","ID_TEAM");
	$new_id_team=$maxid_team+1;
	if($maxid_lge=="") $new_id_team=1;
	$q="insert into 03_LEAGUES_TEAMS (ID_TEAM,ID_OWNER,ID_LEAGUE,ID_SERIES,TEAM,DEF_LGE,USE_LGE,ADMIN,DATE) values 
		(".$new_id_team.",".$id_creator.",".$new_id_lge.",".$new_id_series[$nisc].",'".$team."',1,1,1,'".$GLOBAL_TODAY."')";
	mysqli_query($db,$q);
	
	echo "OK";
}

if($_POST["func"]=="sign_team"){
	global $user_class;global $GLOBAL_TODAY;
	$sessione = new Sessione();	
	
	$db=getDB();
	
	$usr=$_SESSION["username"];
	$id_user=GET_USR_ID($usr);
	$lgs=$user_class[$id_user]->usr_leagues_id;
	
	$code=$_POST["code"];
	$tname=$_POST["tname"];
	
	//GET SERIES ID
	$q="select * from 01_LEAGUES_DETAIL where CODE_AN='".$code."'";
	$res=$db->query($q);
	while($row=mysqli_fetch_array($res)){$id_lge=$row["ID_PARENT"];$id_ser=$row["ID_SERIES"];}
	if(in_array($id_lge,$lgs)){$num=1;} else $num=0;
	
	if($num==1){
		echo 'Non puoi iscrivere un&apos;altra squadra nella stessa Lega!';
	} else {
		$maxid_team=GET_MAX_ID("03_LEAGUES_TEAMS","ID_TEAM");
		$newteam_id=$maxid_team+1;
		//CHECK DEFAULT LEAGUE IF ONLY TEAM -> DEFAULT
		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_user;
		$res=$db->query($q);
		$num_tt=mysqli_num_rows($res);
		if($num_tt>0) $def_lge=0; else $def_lge=1;
		//UNSET USE LEAGUE
		$q="update 03_LEAGUES_TEAMS set USE_LGE=0 where ID_OWNER=".$id_user;
		mysqli_query($db,$q);
		//USE 
		$q="insert into 03_LEAGUES_TEAMS (ID_TEAM,ID_OWNER,ID_LEAGUE,ID_SERIES,TEAM,DEF_LGE,USE_LGE,ADMIN,DATE) 
		 values (".$newteam_id.",".$id_user.",".$id_lge.",".$id_ser.",'".$tname."',".$def_lge.",1,0,'".$GLOBAL_TODAY."')";
		 mysqli_query($db,$q);
		 echo "OK";
	}
}

if($_POST["func"]=="save_edit_prof_1"){
	global $GLOBAL_TODAY;global $user_class;global $uind_class;global $tind_class;
	$sessione = new Sessione();	
	
	$db=getDB();
	
	$usr=$_SESSION["username"];
	$id_user=GET_USR_ID(0);
	
	$name=$_POST["name"];
	$sname=$_POST["sname"];
	$birth=$_POST["birth"];
	$region=$_POST["region"];
	$tname=$_POST["def_team"];
	$team_id=$tind_class[$tname];
	
	//UNSET DEFAULT
	$q="update 03_LEAGUES_TEAMS set DEF_LGE=0,USE_LGE=0 where ID_OWNER=".$id_user." and ID_TEAM!=".$team_id;
	mysqli_query($db,$q);
	//SET NEW DEFAULT
	$q="update 03_LEAGUES_TEAMS set DEF_LGE=1,USE_LGE=1 where ID_TEAM=".$team_id;
	mysqli_query($db,$q);
	//UPDATE INFO
	$q="update 02_LEAGUES_USERS set NAME='".$name."',SURNAME='".$sname."',BIRTH='".$birth."',REGION='".$region."' where ID_USER=".$id_user;
	mysqli_query($db,$q);
	echo "OK"; 

}

if($_POST["func"]=="save_edit_prof_2"){
	global $GLOBAL_TODAY;global $user_class;global $uind_class;
	$sessione = new Sessione();	
	
	$db=getDB();
	
	$usr=$_SESSION["username"];
	$id_user=GET_USR_ID(0);
	
	$id_team=$_POST["id_team"];
	$role=$_POST["role"];
	
	$q="update 03_LEAGUES_TEAMS set ROLE='".$role."' where ID_TEAM=".$id_team;
	mysqli_query($db,$q);
	echo "OK"; 

}

?>
