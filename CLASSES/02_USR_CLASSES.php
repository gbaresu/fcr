<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");

$db=getDB();

$sessione=new Sessione();

$usr=$_SESSION["username"];
$q="select * from 02_LEAGUES_USERS where USERNAME='".$usr."'";
$res=$db->query($q);
//USERNAME MUST BE UNIQUE
while($row=mysqli_fetch_array($res)){
	$id_usr=$row["ID_USER"];
}



//DEFINE LEAGUE CLASS
//
// Quantities
//
// -- CALLED IN
//
// $lge_class[1]->usr_id;						USER ID
// $lge_class[1]->usr_email;					USER EMAIL
// $lge_class[1]->usr_active;					USER ACTIVE
// $lge_class[1]->usr_online;					USER ONLINE TIMESTAMP
// $lge_class[1]->usr_date;						USER REG TIMESTAMP
//
// $lge_class[1]->usr_def_team_id;				USER DEFAULT TEAM ID
// $lge_class[1]->usr_use_team_id;				USER IN USE TEAM ID
// $lge_class[1]->usr_def_league_id;			USER DEFAULT LEAGUE ID
// $lge_class[1]->usr_use_league_id;			USER IN USE LEAGUE ID
// $lge_class[1]->usr_teams_id;					ARR USER TEAMS IDS
//

// To do
// Add usr logo 
// Add usr pdoro and b11 [if money] 
//

$user_class[$id_usr]=new USER($id_usr);
$uind_class[$usr]=$user_class[$id_usr]->usr_id;
$user_class[$id_usr]->get_teams($id_usr);
$user_class[$id_usr]->get_usr_info($id_usr);

class USER {
	public function __construct($id_usr){
		$db=getDB();
		$this->username=$uname;
		$q="select * from 02_LEAGUES_USERS where ID_USER='".$id_usr."'";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){
			$this->usr_id=$row["ID_USER"];
			$this->usr_email=$row["EMAIL"];
			$this->usr_active=$row["ACTIVE"];
			$this->usr_online=$row["ONLINE"];
			$this->usr_date=$row["DATE"];
		}
	}
	public function get_teams($id_usr){
		$db=getDB();
		//GET DEFAULT TEAM AND LEAGUE
		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr." and DEF_LGE=1";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){ $this->usr_def_team_id=$row["ID_TEAM"]; }

		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr." and DEF_LGE=1";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){ $this->usr_def_league_id=$row["ID_PARENT"]; }
		//GET IN USE TEAM
		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr." and USE_LGE=1";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){ $this->usr_use_team_id=$row["ID_TEAM"]; }

		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr." and USE_LGE=1";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){ $this->usr_use_league_id=$row["ID_LEAGUE"]; }
		//GET ALL TEAMS
		$usr_teams=array();
		$usr_leagues=array();
		$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr;
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){
			array_push($usr_teams,$row["ID_TEAM"]);
			array_push($usr_leagues,$row["ID_LEAGUE"]);
		}
		$this->usr_teams_id=$usr_teams;
		$this->usr_leagues_id=$usr_leagues;
	}
	public function get_usr_info($id_usr){
		$db=getDB();
		//GET INFO FROM USR TABLE
		$q="select * from 02_LEAGUES_USERS where ID_USER=".$id_usr;
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){
			$this->usr_prof_name=$row["NAME"];
			$this->usr_prof_sname=$row["SURNAME"];
			$this->usr_prof_birth=$row["BIRTH"];
			$this->usr_prof_region=$row["REGION"];
		}
	}
}

/*
echo 'ECHO QUANTITIES</br>';
echo 'ID USER: ';
echo $user_class[1]->usr_id.'</br>';
echo 'EMAIL: ';
echo $user_class[1]->usr_email.'</br>';
echo 'ACTIVE: ';
echo $user_class[1]->usr_active.'</br>';
echo 'ONLINE: ';
echo $user_class[1]->usr_online.'</br>';
echo 'DATE: ';
echo $user_class[1]->usr_date.'</br>';
echo 'DEF TEAM: ';
echo $user_class[1]->usr_def_team_id.'</br>';
echo 'USE TEAM: ';
echo $user_class[1]->usr_use_team_id.'</br>';
echo 'USE LGE: ';
echo $user_class[1]->usr_use_league_id.'</br>';
echo 'ALL TEAMS: ';
print_r($user_class[1]->usr_teams_id).'</br>';
*/

?>
