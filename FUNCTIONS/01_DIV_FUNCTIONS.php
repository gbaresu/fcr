<?php

function DIV_BUTTON($IMG,$TXT,$FNC,$STL){
	//TASTO SENZA CONTORNO ASSOCIATO AD AZIONE FNC
	global $path;
	echo '<div class="BUTTON" style="'.$STL.'" onclick="'.$FNC.'()" onsubmit="'.$FNC.'()">';
		echo '<div class="BUTTON_IMG" style="background-image:url(&apos;'.$path.'PIC/ICONS/'.$IMG.'.png&apos;)"></div>';
		echo '<div class="BUTTON_TXT">'.$TXT.'</div>';
	echo '</div>';
}

function DIV_BUTTON_LOGO_WA($TXT,$FNC,$STL){
	//TASTO CON LOGO SENZA CONTORNO ASSOCIATO AD AZIONE FNC CON ARGOMENTO
	global $path;
	echo '<div class="BUTTON_LOGO" style="'.$STL.'" onclick="'.$FNC.'" onsubmit="'.$FNC.'">';
		echo '<div class="BUTTON_IMG_LOGO" style="background-image:url(&apos;'.$path.'PIC/ICONS/fcr.png&apos;)"></div>';
		echo '<div class="BUTTON_TXT_LOGO">'.$TXT.'</div>';
	echo '</div>';
}
function DIV_BUTTON_LOGO($TXT,$FNC,$STL){
	//TASTO SENZA CONTORNO ASSOCIATO AD AZIONE FNC
	global $path;
	echo '<div class="BUTTON_LOGO" style="'.$STL.'" onclick="'.$FNC.'()" onsubmit="'.$FNC.'()">';
		echo '<div class="BUTTON_IMG_LOGO" style="background-image:url(&apos;'.$path.'PIC/ICONS/fcr.png&apos;)"></div>';
		echo '<div class="BUTTON_TXT_LOGO">'.$TXT.'</div>';
	echo '</div>';
}

function SELECT_BAR(){
	echo '<table id="SELECT_BAR">';
		echo '<tr>';
			echo '<td class="nohov" id="SERIE_A"></td>';
			echo '<td onclick="go_to_form();">PROBABILI FORMAZIONI</td>';
			echo '<td onclick="go_to_voti_live();">VOTI LIVE</td>';
			echo '<td onclick="go_to_voti_fin();">VOTI DEFINITIVI</td>';
			echo '<td onclick="go_to_quot();">QUOTAZIONI</td>';
			echo '<td style="border-right:3px solid #AFD6E3;" onclick="go_to_stat();">STATISTICHE</td>';
		echo '</tr>';
	echo '</table>';
}

function DIV_DROP($IMG,$IMG2,$TXT,$CLS,$STL){
	//DIV STILE TASTO NON ASSOCIATO A NESSUNA AZIONE
	global $path;global $user_class;global $uind_class;global $team_class;
	
	//GET USER
	$usr=$_SESSION["username"];
	//BUTTONS IN THE LOGIN BAR
	echo '<div id="BUTTON_DROP_'.$IMG.'" class="BUTTON '.$CLS.'" style="'.$STL.'">';
		echo '<div class="BUTTON_IMG" style="background-image:url(&apos;'.$path.'PIC/ICONS/'.$IMG.'.png&apos;)"></div>';
		echo '<div class="BUTTON_IMG_2" style="background-image:url(&apos;'.$path.'PIC/ICONS/'.$IMG2.'.png&apos;)"></div>';
		echo '<div class="BUTTON_TXT">'.$TXT.'</div>';
	echo '</div>';
	
	//DROPDOWN MENU FOR EACH BUTTON
	if($IMG!="home" and $IMG!="crown"){
		echo '<div class="DROPDOWN_BAR" id="DROPDOWN_DIV_'.$IMG.'">';
			echo '<table id="DROP_DOWN_MENU">';
			if($IMG=="user"){
				echo '<tr><td onclick="go_to_prof()">PROFILO</td></tr>';
				//GET USER'S TEAMS
				$teams=array();
				$teams=$user_class[$uind_class[$usr]]->usr_teams_id;
				foreach($teams as $val){
					$tt=$user_class[$uind_class[$usr]]->usr_use_team_id;
					$ad=$team_class[$val]->tms_admin;
					if($ad==1) $star="*"; else $star="";
					echo '<tr><td style="text-decoration:underline;" onclick="usr_ch_team(&apos;'.$val.'&apos;,&apos;'.$tt.'&apos;)">'.$team_class[$val]->tms_name.$star.'</td></tr>';
				}
				echo '<tr><td onclick="go_to_new_lge();">CREA LEGA</td></tr>';
				echo '<tr><td onclick="go_to_sign_team();">ISCRIVI SQUADRA</td></tr>';
				echo '<tr><a class="DROPDOWN_LINK" href="?page=settings"><td>IMPOSTAZIONI</td></a></tr>';
			}
			$tt=$user_class[$uind_class[$usr]]->usr_use_team_id;
			$ad=$team_class[$tt]->tms_admin;
			if($IMG=="league"){
				if($ad==1) echo '<tr><td><a class="DROPDOWN_LINK" href="?page=handle">GESTISCI</a></td></tr>';
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">CLASSIFICA</a></td></tr>';
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">ALTRE SERIE?</a></td></tr>';
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">COPPE?</a></td></tr>';
			}
			if($IMG=="team"){
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">ROSA</a></td></tr>';
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">FORMAZIONE</a></td></tr>';
				echo '<tr><td><a class="DROPDOWN_LINK" href="#">MERCATO</a></td></tr>';
			}
			echo '</table>';
		echo '</div>';
	}	
	//WHEN ONE DROPDOWN IS OPEN, OTHERS SHOULD BE CLOSED
	$menu_names=array("user","league","team");
	foreach($menu_names as $k=>$v){
		if($v==$IMG) unset($menu_names[$k]);
	}
	//DROPDOWN SCRIPT
	echo '<script>';
		echo '$("#BUTTON_DROP_'.$IMG.'").click(function(){
			event.stopPropagation();
			$("#DROPDOWN_DIV_'.$IMG.'").toggle();';
			foreach($menu_names as $val){
				echo '$("#DROPDOWN_DIV_'.$val.'").css("display","none");';
			}
		echo '})';
	echo '</script>';
}

function DIV_ONLY_ICON($IMG,$FNC){
	global $path;
	echo '<div id="BUTTON_ONLY_ICON" onclick="'.$FNC.'()">';
		echo '<div class="BUTTON_IMG" style="background-image:url(&apos;'.$path.'PIC/ICONS/'.$IMG.'.png&apos;)"></div>';
	echo '</div>';
}

function DIV_ONLY_ICON_NOCLICK($IMG){
	global $path;
	echo '<img src="'.$path.'PIC/ICONS/'.$IMG.'.png">';
}

function OPEN_DIV(){
	echo '<div id="DIV_MAIN_CONTENT">';
}
function CLOSE_DIV(){
	echo '</div>';
}

function OPEN_FRAME_STEP_DIV($txt,$col,$tcol){
	echo '<div class="FRAME_DIV">';
	DIV_BAND($txt,$col,$tcol);
}

function CLOSE_FRAME_STEP_DIV(){
	echo '</div>';
}

function DIV_BAND($txt,$col,$tcol){
	echo '<div id="BAND_DIV" style="color:'.$tcol.';background-color:'.$col.'">'.$txt.'</div>';
}


?>
