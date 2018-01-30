<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");

$db=getDB();

class Sessione{
	function __construct($cookie=true){
		session_start(); // apriamo una nuova sessione
		if (($_SESSION['username']=="")) { // se non abbiamo una sessione attiva, tentiamo il login dai cookies
			$this->loginFromCookies();
			$db=getDB();
			$query="update 02_LEAGUES_USERS set ONLINE='".date('Y-m-d H:i:s')."' where USERNAME='".$_SESSION['username']."'";
			$res=mysqli_query($db,$query);
		} else {
			$db=getDB();
			$query="update 02_LEAGUES_USERS set ONLINE='".date('Y-m-d H:i:s')."' where USERNAME='".$_SESSION['username']."'";
			$res=mysqli_query($db,$query);
		}
    }
	function login($usernick,$userpassword,$cookie=true){
		$db=getDB();// Cerchiamo l'utente nel database
		$query="select * from 02_LEAGUES_USERS where BINARY USERNAME='".($usernick)."' AND PASSWORD= '".$userpassword."'";
		$res = mysqli_query($db,$query) or die ("Can't confirm user in the database.");
		$row = mysqli_fetch_array($res);
		extract($row);
		$num = mysqli_num_rows($res);
		if($num!=1) {return false;}
		$_SESSION['username']=$usernick;
		$_SESSION['access_level']=$access_level;
		if ($cookie) {
			setcookie('cook_user',$usernick,time()+1296000,"/");
			setcookie('cook_passwd',$userpassword,time()+1296000,"/");
		}
		unset($usernick,$userpassword);	 // per paranoia eliminiamo le variabili
		return true;
	}	
	function resetCookies() {
		$p = session_get_cookie_params();
		setcookie('cook_user', "",-(31536000+1296000),"/");
		setcookie('cook_passwd', "",-(31536000+1296000),"/");
		setcookie(session_name(), "", 0, $p["path"], $p["domain"]);
	}
	function logout(){
		$destroyed=session_destroy();
		$_SESSION['username']=null;
		$_SESSION['access_level']=null;
		$this->resetCookies();  
		return $destroyed;
	}
	function loginFromCookies(){
    if (!(isset($_COOKIE['cook_user']) and isset($_COOKIE['cook_passwd']))) {
			return false;
		}
		else {
			return ($this->login($_COOKIE['cook_user'],$_COOKIE['cook_passwd'],true));
		}
	}
}

?>
