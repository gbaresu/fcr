<?php

require_once(dirname(__FILE__)."/DB/00_ACCESS_DB.php");
require_once(dirname(__FILE__)."/CLASSES/00_LGN_CLASSES.php");
require_once(dirname(__FILE__)."/CLASSES/02_USR_CLASSES.php");
require_once(dirname(__FILE__)."/CLASSES/01_LGE_CLASSES.php");
require_once(dirname(__FILE__)."/CLASSES/03_TMS_CLASSES.php");
require_once(dirname(__FILE__)."/LINKS/00_LINKER.php");
require_once(dirname(__FILE__)."/PAGES/00_PAGE_sys.php");
require_once(dirname(__FILE__)."/FUNCTIONS/00_LGN_FUNC.php");
require_once(dirname(__FILE__)."/FUNCTIONS/01_DIV_FUNCTIONS.php");
require_once(dirname(__FILE__)."/FUNCTIONS/02_PRN_SCRIPT.php");
require_once(dirname(__FILE__)."/FUNCTIONS/03_SYS_FUNCTIONS.php");
require_once(dirname(__FILE__)."/FUNCTIONS/04_DIV_UPLOAD.php");
require_once(dirname(__FILE__)."/FUNCTIONS/99_SET_QUANT.php");


error_reporting(0);

date_default_timezone_set('Europe/Rome');

function page_content(){
	global $FLAG_NO_LEAGUE;
	$usr=$_SESSION["username"];
	$page=$_GET["page"];
	$active=$_GET["act"];

	echo '<div style="height:50px;"></div>';
	//--------------------------------------------- REDIRECT LINKS
	//Which page has been requested
	$req_page=basename($_SERVER["PHP_SELF"]);
	//MAIN.php no USER 
	if($req_page=="main.php" and $usr=="" and $page==""){
		login_bar();
		$tp="GEN";
		draw_logo($tp);
		SELECT_BAR();
		OPEN_DIV();
		HOME_PAGE_NO_USR();
		CLOSE_DIV();
	}
	//MAIN.php?REG page, no USER
	if($req_page=="main.php" and $usr=="" and $page=="reg" and $active==""){
		login_bar();
		$tp="GEN";
		draw_logo($tp);
		echo '<div id="PRES_DIV">';
			echo '<div id="PRES_DIV_CONTENT">';
				get_reg_form();
			echo '</div>';
		echo '</div>';
	}
	//MAIN.php?REG page with ACTIVE, no USER
	if($req_page=="main.php" and $usr=="" and $page=="reg" and $active==1){
		login_bar();
		$tp="GEN";
		draw_logo($tp);
		echo '<div id="PRES_DIV">';
			echo '<div id="PRES_DIV_CONTENT">';
				get_reg_form();
			echo '</div>';
		echo '</div>';
	}
	//MAIN.php with USER
	if($req_page=="main.php" and $usr!="" and $page==""){
		login_bar();
		$tp="GEN";
		draw_logo($tp);
		SELECT_BAR();
		OPEN_DIV();
		if($FLAG_NO_LEAGUE=="ON") WARN_BAR("Non sei iscritto a nessuna Lega: creane una o iscriviti (inserendo il codice che ti ha dato l&apos;admin) cliccando sul tuo nome utente nella barra in alto!");
		CLOSE_DIV();
	} else {
		linker($page);
	}
	echo '<script>
		$(window).click(function() {
			$("#DROPDOWN_DIV_user").css("display","none");
			$("#DROPDOWN_DIV_league").css("display","none");
			$("#DROPDOWN_DIV_team").css("display","none");
		});	
	</script>';
}

function draw_header(){
	echo '<!DOCTYPE html>';
		echo '<html>';
			echo '<head>';
				echo '<title>Fantacarriera</title>';
				echo '<meta name="title" content="Fantacarriera" />';
				echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
				echo '<meta http-equiv="refresh" content="1800" />';
				echo '<meta name="description" content="Lega" />';
				echo '<meta name="keywords" content="info" /> ';
				echo '<meta name="medium" content="blog" />';
				echo '<meta name="author" content="ggg"/>';
				echo '<link href="favicon.ico" rel="shortcut icon"/>';
				//echo '<link href="https://fonts.googleapis.com/css?family=Allerta Stencil" rel="stylesheet">';
				echo '<link href="https://fonts.googleapis.com/css?family=Nova Flat" rel="stylesheet">';
				//Get latest jquery compressed file
				echo '<script src="http://code.jquery.com/jquery-latest.min.js"></script>';
				echo '<script type="text/javascript" src="JQUERY/JS_login.js"></script>';
				echo '<script type="text/javascript" src="JQUERY/JS_sys.js"></script>';
				echo '<script type="text/javascript" src="JQUERY/jquery.sha256.min.js"></script>';
				//Get css files
				echo '<link rel="stylesheet" href="CSS/login.css">';
				echo '<link rel="stylesheet" href="CSS/reg.css">';
				echo '<link rel="stylesheet" href="CSS/objects.css">';
			echo '</head>';
}

function login_bar(){
	$usr=$_SESSION["username"];
	echo '<div id="LOGIN_BAR_FIXED">';
		if($usr==""){
			getloginform();
		} else {
			getlogindone();
		}
	echo '</div>';
}

function draw_pres(){
	echo '<div id="PRES_DIV">';
		//echo '<div id="PRES_DIV_SIDE" class="fleft"></div>';
		echo '<div id="PRES_DIV_CENT" class="">dddd</div>';
		//echo '<div id="PRES_DIV_SIDE" class="fright"></div>';
	echo '</div>';
}

function draw_logo($type){
	if($type=="GEN"){
		echo '<div id="LOGO_DIV" onclick="home()">';
			echo '<div id="LOGO_BIG"></div>';
			echo '<div id="LOGO_TXT">il VERO fantacalcio manageriale</div>';
		echo '</div>';
	} elseif($type="LEAGUE") {
		
	}
}

function draw_website(){
	echo '<body>';
		draw_header();
        page_content();
	echo '</body>';
    echo '</html>';
}


?>
