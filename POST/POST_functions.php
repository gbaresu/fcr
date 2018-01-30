<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");
require_once(dirname(__FILE__)."/../CLASSES/00_LGN_CLASSES.php");
require_once(dirname(__FILE__)."/../CLASSES/02_USR_CLASSES.php");
require_once(dirname(__FILE__)."/../FUNCTIONS/99_SET_QUANT.php");

function do_login($user,$pass){
	$logged=false;
	$sessione = new Sessione();
	$sessione->login($user,$pass,true);
	if($_SESSION["username"]==$user) $logged=true;
	return $logged;
}

function do_logout(){
	$sessione = new Sessione();
	$sessione->logout();
}

if($_POST["func"]=="login"){
	$sessione = new Sessione();
	global $user_class;global $uind_class;
	$response=do_login((strip_tags(trim($_POST["user"]))),$_POST["pass"]);
	$db=getDB();
	if($response) {
		$usr=$_SESSION["username"];
		$q="select * from 02_LEAGUES_USERS where USERNAME='".$usr."'";
		$res=$db->query($q);
		while($row=mysqli_fetch_array($res)){$usr_id=$row["ID_USER"];}
		$q="update 03_LEAGUES_TEAMS set USE_LGE=DEF_LGE where ID_OWNER=".$usr_id;
		mysqli_query($db,$q);
		echo 'OK';
	} else {echo 'NO';}
}
if($_POST["func"]=="logout"){
	$sessione = new Sessione();
	do_logout();
}
if($_POST["func"]=="getlogindone"){
	$sessione = new Sessione();
	getlogindone();
}

if($_POST["func"]=="getloginform"){
	$sessione = new Sessione();
	getloginform();
}

if($_POST["func"]=="nu_submit"){
	global $GLOBAL_TODAY;
	$sessione = new Sessione();	
	$today=$GLOBAL_TODAY;
	if($_SESSION["username"]==""){
		$socca="";
		$user=$_POST["user"];
		$pass=$_POST["pass"];
		$email=$_POST["email"];
		if( $user != "" and $pass != "" and $email != ""){
			$db=getDB();
			//Check if username is already used
			$query="SELECT * FROM 02_LEAGUES_USERS WHERE USERNAME= BINARY '".$user."'";
			$res = mysqli_query($db,$query) or die ("Couldn't execute query.");
			$row = mysqli_fetch_array($res);
			extract($row);
			$num = mysqli_num_rows($res);
			if($num!=0) {
				echo "Username ".$user." già in uso, devi sceglierne un altro!";
			} else {
				$query = "SELECT MAX(ID_USER) FROM 02_LEAGUES_USERS";
				$result = mysqli_query($db,$query)
					or die ("Couldn't execute query.");
				$maxid = mysqli_fetch_row($result);
				$maxid=$maxid[0];
				$maxid=$maxid+1;
				$user=str_replace(" ","_",$user);
				$query = "INSERT INTO 02_LEAGUES_USERS (USERNAME,PASSWORD,EMAIL,ID_USER,ACTIVE,DATE) 
				VALUES ('".(strip_tags(trim($user)))."','".$pass."','".$email."',".$maxid.",1,'".$today."')";
				$result = mysqli_query($db,$query) or die ("Couldn't execute query.");
                echo "OK";
			}
		}
		//else echo 'Completa tutti i campi!';
	}
	else echo 'Sei gia loggato, non puoi registrare un nuovo account!';
}

if($_GET["function"]=="conf_nu"){
	$db=getDB();
	$query = "SELECT * FROM GEN_utente WHERE unique_id='".$_GET["code"]."'";
	$res = mysqli_query($db,$query) or die ("Couldn't execute query-conf1.");
	$num = mysqli_num_rows($res);
	if($num==1){
		$query = "UPDATE GEN_utente SET active='1' WHERE unique_id='".$_GET["code"]."'";
		$result = mysqli_query($db,$query) or die ("Couldn't execute query-conf2.");
		header('Location: ../main.php');
	}
	else echo 'Errore nella conferma dell\'account. Si prega di contattare l\'amministratore.';
}

if($_POST["func"]=="usr_ch_team"){
	$sessione = new Sessione();
	
	global $team_class;
	
	$db=getDB();
	
	$nteam=$_POST["tnew"];
	$oteam=$_POST["told"];
	$id_lge=$team[$nteam]->tms_league;
	
	$q="update 03_LEAGUES_TEAMS set USE_LGE=0 where ID_TEAM=".$oteam;
	mysqli_query($db,$q) or die("NO CONNECTION -> usr_ch_team");
	$q="update 03_LEAGUES_TEAMS set USE_LGE=1 where ID_TEAM=".$nteam;
	mysqli_query($db,$q) or die("NO CONNECTION -> usr_ch_team");
	echo "OK";
}

?>
