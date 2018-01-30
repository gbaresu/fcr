<?php

function linker($page){
	$usr=$_SESSION["username"];
	if($page=="success"){
		login_bar();
		OPEN_DIV();
		echo 'SUCCESS!';
		CLOSE_DIV();
	}
	if($page=="profile"){
		login_bar();
		OPEN_DIV();
		PAGE_PROFILE($usr);
		CLOSE_DIV();
	}
	if($page=="new_lge"){
		login_bar();
		OPEN_DIV();
		PAGE_NEW_LGE();
		CLOSE_DIV();
	}
	if($page=="sign_team"){
		login_bar();
		OPEN_DIV();
		PAGE_SIGN_TEAM();
		CLOSE_DIV();
	}
	if($page=="handle"){
		login_bar();
		OPEN_DIV();
		PAGE_HANDLE_LGE();
		CLOSE_DIV();
	}

}

?>
