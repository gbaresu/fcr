<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");

global $lge_class;
$db=getDB();

$usr=$_SESSION["username"];
$id_usr=$user_class[$uind_class[$usr]]->usr_id;
$id_lge=$user_class[$uind_class[$usr]]->usr_use_league_id;

//echo '</br></br></br></br>';

$q="select * from 03_LEAGUES_TEAMS where ID_OWNER=".$id_usr;
$res=$db->query($q);
while($row=mysqli_fetch_array($res)){
	$id_team=$row["ID_TEAM"];
	$team_class[$id_team]=new TEAM($id_team);
	$tind_class[$team_class[$id_team]->tms_name]=$id_team;
}

$q="select * from 03_LEAGUES_TEAMS where ID_LEAGUE=".$id_lge;
$res=$db->query($q);
while($row=mysqli_fetch_array($res)){
	$id_team=$row["ID_TEAM"];
	$team_class[$id_team]=new TEAM($id_team);
	$tind_class[$team_class[$id_team]->tms_name]=$id_team;
}

class TEAM{
	public function __construct($id_team){
		$db=getDB();
		$this->tms_id=$id_team;
		$q="select * from 03_LEAGUES_TEAMS where ID_TEAM=".$id_team;
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){
			$this->tms_name=$row["TEAM"];
			$this->tms_owner=$row["ID_OWNER"];
			$this->tms_league=$row["ID_LEAGUE"];
			$this->tms_series=$row["ID_SERIES"];
			$this->tms_admin=$row["ADMIN"];
			$this->tms_role=$row["ROLE"];
			$this->tms_date=$row["DATE"];
		}
	}
}


?>
