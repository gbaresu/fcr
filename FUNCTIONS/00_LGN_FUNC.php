<?php

function getloginform_reg(){
	
}

function getloginform(){
	$usr=$_SESSION["username"];
	echo '<table id="LOGIN_TABLE">';
		echo '<tr>';
			echo '<form method="POST" id="loginform" style="margin-top:0px;">';
				//echo '<fieldset style="border:none">';
					echo '<label class="input">';
						echo '<td>Username  ';
							echo '<input type="text" name="login_user" id="login-username" style="margin-right:10px;margin-left:5px;" value="" size="15"/>';
						echo '</td>';
					echo '</label>';
					echo '<label class="input">';
						echo '<td>Password';
								echo '<input type="password" name="password" id="login-password"  style="margin-right:10px;margin-left:5px;"size="15"/>';
						echo '</td>';
					echo '</label>';
					echo '<td>';DIV_BUTTON("login","LOGIN","login","");echo '</td>';
					echo '<td>';DIV_BUTTON("register","REGISTRATI","go_to_reg","");echo '</td>';
					echo '<td>';echo '<div id="fb_login"></div>';echo '</td>';
				//echo '</fieldset>';
			echo '</form>';
		echo '</tr>';
	echo '</table>';
	//Login schiacciando invio
	echo '<script>
		$(document).ready(function(){
			$("#login-password").keypress(function(e){
			if(e.keyCode==13) login();
			});
			});';
	echo '</script>';
}

function getlogindone(){
	global $user_class;global $uind_class;global $lge_class;global $team_class;global $tind_class;

	$sessione = new Sessione();

	$usr=$_SESSION["username"];
	$lge_use=$user_class[$uind_class[$usr]]->usr_use_league_id;
	$lge_name=$lge_class[$lge_use]->lge_name;
	$ser_names=$lge_class[$lge_use]->lges_names;
	$team_use=$user_class[$uind_class[$usr]]->usr_use_team_id;
	$team_name=$team_class[$team_use]->tms_name;
	$team_ser=$team_class[$team_use]->tms_series;
	$ser_num=$lge_class[$lge_use]->lge_series;
	//ADMIN
	$ad=$team_class[$team_use]->tms_admin;	
	//Padding left measure
	$plpx="15px";
	$prpx="20px";
	
	echo '<div id="LOGGED_IN_BAR_LEFT" style="float:left;">';
		echo '<table id="LOGGED_IN_TABLE">';
			echo '<tr style="vertical-align:initial;">';
				echo '<td>';
					DIV_ONLY_ICON("home","home");
				echo '</td>';
				echo '<td>';
					DIV_DROP("user","menu-list",$usr,"nohov bright bleft","padding-right:".$prpx.";padding-left:".$plpx.";");
				echo '</td>';
				echo '<td>';
					if($ser_num==1 or $ser_num=="") $str_lge=$lge_name; else $str_lge=$lge_name.': '.$ser_names[$team_ser];
					DIV_DROP("league","menu-list",$str_lge,"nohov bright","padding-right:".$prpx.";padding-left:".$plpx.";");
				echo '</td>';
				echo '<td>';
					DIV_DROP("team","menu-list",$team_name,"nohov bright","padding-right:".$prpx.";padding-left:".$plpx.";");
				echo '</td>';
				if($ad==1) {
					echo '<td>';
						DIV_DROP("crown","","Sei amministratore di questa Lega!","nohov","color:red");
					echo '</td>';
				}
			echo '</tr>';
		echo '</table>';
	echo '</div>';
	echo '<div id="LOGGED_IN_BAR_RIGHT" style="float:right;">';
		echo '<table id="LOGGED_IN_TABLE">';
			echo '<tr>';
				echo '<td>';
					DIV_BUTTON("logout","LOGOUT","logout","");
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	echo '</div>';
}


function get_reg_form(){
	echo '<div id="NEW_USER_REG" class="ubuntu">';
		echo 'Compila i campi come suggerito di seguito e comincia la tua fanta-carriera con noi!';
			echo '<form method="POST" action="" id="addnuform">';
				echo '<fieldset style="margin:auto;border:none;">';
					echo '<table id="TABLE_TYPE_REG">';

						echo '<tr style="height:100px;">';
							echo '<td style="width:20%;">NOME UTENTE</td>';
							echo '<td style="width:10%;"><span id="reg_check_uname"">CHECK</span></td>';
							echo '<td style="width:10%;"><input type="text" name="regusername" id="regusername" size="20" maxlength="20" value=""/></td>';
							echo '<td class="ubuntu" style="width:60%;">Minimo 3 caratteri, massimo 20. Solo numeri, lettere, trattini o underscore. Al posto dello spazio verr&agrave; sostituito il carattere "_"</td>';
						echo '</tr>';
		
						echo '<tr style="height:100px;">';
							echo '<td style="width:20%;">PASSWORD</td>';
							echo '<td style="width:10%;"><span id="reg_check_pass" style="color:black;">CHECK</span></td>';
							echo '<td style="width:10%;"><input type="password" name="regpassword" id="regpassword" size="20" maxlength="80" value=""/></td>';
							echo '<td style="width:60%;" class="ubuntu">Nel nostro DB le password vengono criptate, se dovessi perderla dovresti necessariamente cambiarla! La password deve avere una lunghezza minima di 5 e una massima di 20.
								Qualsiasi carattere pu&ograve; essere utilizzato.</td>';
						echo '</tr>';

						echo '<tr style="height:100px;">';
							echo '<td style="width:10%;">E-MAIL</td>';
							echo '<td style="width:10%;"><span id="reg_check_email" style="color:black;">CHECK</span></td>';
							echo '<td style="width:20%;"><input type="text" name="regemail" id="regemail" size="20" maxlength="80" value=""/></td>';
							echo '<td class="ubuntu" style="width:60%;">Inserisci un indirizzo valido di uso quotidiano. L&apos;email non verr&agrave; mai utilizzata per scopi pubblicitari di organismi terzi. Potr&agrave; servire
								per il recupero credenziali o per comunicazioni di questo sito a solo scopo fantacalcistico.</td>';
						echo '</tr>';

					echo '</table>';
				echo '</fieldset>';	
				echo '<table style="text-align:center;float:center;margin:auto;">';
					echo '<tr><td id="out_reg">Eventuali problemi verranno visualizzati qui!</td></tr>';
				echo '</table>';
				echo '<table style="text-align:center;float:center;margin:auto;">';
					echo '<tr><td>';
						DIV_BUTTON("register","REGISTRAMI","nu_submit","margin:auto;padding:2px;border:1px solid black;float:center;");
					echo '</td></tr>';
				echo '</table>';
				echo '<div style="text-align:center">';
				
				echo '</div>';
	  echo '</form>';
	  reg_check_uname();
	  reg_check_pass();
	  reg_check_email();
	echo '</div>';
}


?>
