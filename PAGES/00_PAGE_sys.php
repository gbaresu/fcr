<?php


function PAGE_PROFILE($usr){
	global $user_class;global $uind_class;global $team_class;global $tind_class;global $lge_class;
	global $GLOBAL_ROLES_TEAM;
	
	$usr_id=$user_class[$uind_class[$usr]]->usr_id;
	$tdef_id=$user_class[$usr_id]->usr_def_team_id;
	$tms_id=$user_class[$usr_id]->usr_teams_id;
	
	OPEN_FRAME_STEP_DIV("PROFILO UTENTE: ".$usr,"#000000","#FFFFFF");
	$w1="25%;";
	$w2="65%;";
	$w3="10%;";
	echo '<div id="PROF_container">';
		echo '<div style="width:75%;float:left;">';
		echo '<table class="TABLE1 ubuntu" id="PROF_table">';
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Nome</td>';
				echo '<td style="width:'.$w2.';" id="PROF_MOD_NAME"><span id="PROF_NAME_TXT">'.$user_class[$usr_id]->usr_prof_name.'</span>
						<input style="display:none;" id="PROF_NAME_INPUT" value="'.$user_class[$usr_id]->usr_prof_name.'"/></td>';
				echo '<td style="width:'.$w3.';" id="EDIT_NAME" class="PROF_EDIT"></td>';
			echo '</tr>';
			toggle_edit("EDIT_NAME","PROF_NAME");
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Cognome</td>';
				echo '<td style="width:'.$w2.';" id="PROF_MOD_SNAME"><span id="PROF_SNAME_TXT">'.$user_class[$usr_id]->usr_prof_sname.'</span>
						<input style="display:none;" id="PROF_SNAME_INPUT" value="'.$user_class[$usr_id]->usr_prof_sname.'"/></td>';
				echo '<td style="width:'.$w3.';" id="EDIT_SNAME" class="PROF_EDIT"></td>';
			echo '</tr>';
			toggle_edit("EDIT_SNAME","PROF_SNAME");
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Data di nascita</td>';
				echo '<td style="width:'.$w2.';" id="PROF_MOD_BIRTH"><span id="PROF_BIRTH_TXT">'.$user_class[$usr_id]->usr_prof_birth.'</span>
						<input type="date" style="display:none;" id="PROF_BIRTH_INPUT" value="'.$user_class[$usr_id]->usr_prof_birth.'"/></td>';
				echo '<td style="width:'.$w3.';" id="EDIT_BIRTH" class="PROF_EDIT"></td>';
			echo '</tr>';
			toggle_edit("EDIT_BIRTH","PROF_BIRTH");
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Regione</td>';
				echo '<td style="width:'.$w2.';" id="PROF_MOD_REGION"><span id="PROF_REGION_TXT">'.$user_class[$usr_id]->usr_prof_region.'</span>
						<input style="display:none;" id="PROF_REGION_INPUT" value="'.$user_class[$usr_id]->usr_prof_region.'"/></td>';
				echo '<td style="width:'.$w3.';" id="EDIT_REGION"  class="PROF_EDIT"></td>';
			echo '</tr>';
			toggle_edit("EDIT_REGION","PROF_REGION");
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Squadra Default</td>';
				echo '<td style="width:'.$w2.';">';
					echo '<select class="sel_base" id="PROF_MOD_DEF_TEAM">';
					echo '<option val="'.$tdef_id.'">'.$team_class[$tdef_id]->tms_name.'</option>';
					foreach($tms_id as $val){
						echo '<option val="'.$val.'">'.$team_class[$val]->tms_name.'</option>';
					}
					echo '</select>';
				echo '</td>';
				echo '<td></td>';
			echo '</tr>';
		echo '</table>';
		DIV_BUTTON_LOGO("SALVA","SAVE_EDIT_PROF_1","margin:auto;display:block;");
		echo '</div>';
	echo '<div style="width:20%;float:right;">';
		echo 'FOTO';
	echo '</div>';
	echo '</div>';
	CLOSE_FRAME_STEP_DIV();

	$ids=$user_class[$uind_class[$usr]]->usr_teams_id;
	foreach($ids as $val){
		$tname=$team_class[$val]->tms_name;
		$role=$team_class[$val]->tms_role;
		$lge_id=$team_class[$val]->tms_league;
		$ser_id=$team_class[$val]->tms_series;
		$ser_nm=$lge_class[$lge_id]->lges_names[$ser_id];
		$lge_name=$lge_class[$lge_id]->lge_name;
		$num_serie=$lge_class[$lge_id]->lge_series;
		OPEN_FRAME_STEP_DIV("SQUADRA: ".$tname,"#000000","#FFFFFF");
		echo '<div id="PROF_container">';
		echo '<table class="TABLE1 ubuntu" id="PROF_table">';
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Nome squadra</td>';
				echo '<td style="width:'.$w2.';">'.$tname.'</td>';
				echo '<td style="width:'.$w3.';"></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Lega di appartenenza</td>';
				echo '<td style="width:'.$w2.';">'.$lge_name.'</td>';
				echo '<td style="width:'.$w3.';"></td>';
			echo '</tr>';
			if($num_serie>1){
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Serie</td>';
				echo '<td style="width:'.$w2.';">'.$ser_nm.'</td>';
				echo '<td style="width:'.$w3.';"></td>';
			echo '</tr>';
			}
			echo '<tr>';
				echo '<td style="width:'.$w1.';">Ruolo</td>';
				echo '<td style="width:'.$w2.';"><select style="width:auto;" id="PROF_ROLE_'.$val.'" class="sel_base">';
					echo '<option>'.$role.'</option>';
					foreach($GLOBAL_ROLES_TEAM as $v2){echo '<option>'.$v2.'</option>';}
				echo '</select></td>';
				echo '<td style="width:'.$w3.';"></td>';
			echo '</tr>';
		echo '</table>';		
		DIV_BUTTON_LOGO_WA("SALVA","SAVE_EDIT_PROF_2(".$val.")","margin:auto;display:block;");
		echo '</div>';
		CLOSE_FRAME_STEP_DIV();
	}
}

function PAGE_NEW_LGE(){
	//PAGINA CREAZIONE NUOVA LEGA
	global $GLOBAL_NMAX_TEAMS_PER_LGE;global $GLOBAL_NMIN_TEAMS_PER_LGE;global $GLOBAL_NMAX_LGE;
	
	$lge_num=array();
	
	echo '<div id="NEW_LGE_DIV" class="ubuntu">';
	
		OPEN_FRAME_STEP_DIV("STEP 1: NOME LEGA","#000000","#FFFFFF");	
		//TRIAL
		//echo '<div style="font-size:20px;">';
		//	GET_CODE();
		//echo '</div>';
		$usr=$_SESSION["username"];

		echo '<table id="NEW_LGE_TABLE">';
			echo '<tr>';
				echo '<form method="POST" id="new_lge_form">';
					echo '<fieldset style="border:none">';
						echo '<label class="input">';
							echo '<td>  ';
								echo '<input type="text" name="new_lge_name" id="new_lge_name" style="margin-right:10px;margin-left:5px;" value="" size="15"/>';
							echo '</td>';
							echo '<td style="width:10%;"><span id="new_lge_check_name" class="padding5px">CHECK</span></td>';
							echo '<td>';
								echo 'Nome Lega: minimo 3 caratteri massimo 20. </br> Solo lettere, numeri o i simboli "_" e "-". Gli spazi saranno sostituiti dal simbolo "_"';
							echo '</td>';
						echo '</label>';
					echo '</fieldset>';
				echo '</form>';
			echo '</tr>';
		echo '</table>';
		CLOSE_FRAME_STEP_DIV();
			
		for($i=1;$i<=$GLOBAL_NMAX_LGE;$i++){
			array_push($lge_num,$i);
		}
		OPEN_FRAME_STEP_DIV("STEP 2: STRUTTURA LEGA","#000000","#FFFFFF");
		echo '<table id="NEW_LGE_TABLE">';
			echo '<tr>';
				echo '<form method="POST">';
					echo '<label class="input">';
						echo '<td>';
							echo '<select style="width:100%;" id="NS_sel" class="sel_base">';
								echo '<option>NUM</option>';
								foreach($lge_num as $val){echo '<option>'.$val.'</option>';}
							echo '</select>';
						echo '</td>';
						echo '<td style="width:10%;"><span id="new_series_check" class="padding5px">CHECK</span></td>';
						echo '<td>';
							echo 'Numero serie: in quante Serie &egrave; suddivisa la tua lega? ';
						echo '</td>';
					echo '</label>';	
				echo '</form>';
			echo '</tr>';
		echo '</table>';
		
		echo '<table id="DIN_TABLE" class="TABLE_1 ubuntu" style="">';
			echo '<thead>';
			echo '<tr><th>Numero serie</th><th>Partecipanti</th><th>Nome Serie</th><th>Livello</th></tr>';
			echo '</thead>';
			for($i=1;$i<=8;$i++){
				echo '<tr id="NSQ_LGE_'.$i.'">';
					echo '<td id="NL_num_serie_'.$i.'">'.$i.'</td>';
					echo '<td>';
						echo '<select id="NL_teams_per_lge_'.$i.'" class="sel_base">'; 
							for($k=$GLOBAL_NMIN_TEAMS_PER_LGE;$k<=$GLOBAL_NMAX_TEAMS_PER_LGE;$k++){
								echo '<option>'.$k.'</option>';
							}
						echo '</select>';
					echo '</td>';
					echo '<td>';
						echo '<input type="text" name="NL_name_serie_'.$i.'" id="NL_name_serie_'.$i.'" value="" size="15"/>';
					echo '</td>';
					echo '<td>';
						echo '<select id="NL_level_'.$i.'" class="sel_base">'; 
							for($k=1;$k<=$GLOBAL_NMAX_LGE;$k++){
								echo '<option>'.$k.'</option>';
							}
						echo '</select>';						
					echo '</td>';
				echo '</tr>';
			}
		
		echo '</table>';
		//Call jquery script to handle table elements
		create_lge_num_serie();
		//Call script to check league name
		new_lge_check_name();
		//Call script to check series name
		new_lge_check_series_name();
		echo '<div style="margin:5px">';
			echo 'Quando scegli di avere pi&ugrave; serie puoi inserire i meccanismi di promozione/retrocessione tra le varie serie! Pi&ugrave; avanti potrai scegliere quali competizioni far giocare ai partecipanti.';
		echo '</div>';
		//------ ESEMPIO
		DIV_BAND("ESEMPIO DI STRUTTURA","#AFD6E3","#000000");
		echo '<div style="margin:10px;">Di seguito un esempio di come si struttura una Lega composta da pi&ugrave; serie. La Lega "Scappati di casa" ha 32 partecipanti, divisi in 4 serie. Le serie C1a e C1b sono da considerarsi allo stesso livelli.
		Potrai scegliere pi&ugrave; come gestire promozioni e retrocessioni!</div>';
		echo '<table class="TABLE_1 ubuntu" style="margin:auto;">';
			echo '<thead>';
			echo '<tr><th>Numero serie</th><th>Partecipanti</th><th>Nome Serie</th><th>Livello</th></tr>';
			echo '</thead>';
			echo '<tr><td>1</td><td>8</td><td>Serie A</td><td>1</td></tr>';
			echo '<tr><td>2</td><td>8</td><td>Serie B</td><td>2</td></tr>';
			echo '<tr><td>3</td><td>8</td><td>Serie C1a</td><td>3</td></tr>';
			echo '<tr><td>4</td><td>8</td><td>Serie C1b</td><td>3</td></tr>';
		echo '</table>';	
		echo '<div style="margin:10px;">Ovviamente puoi anche limitarti a creare una Lega classica a 6, 8 o 10 squadre!</div>';
		CLOSE_FRAME_STEP_DIV();
				
		OPEN_FRAME_STEP_DIV("STEP 3: ISCRIVI LA TUA SQUADRA!","#000000","FFFFFF");
			echo '<div style="margin:10px;">Iscrivi la tua squadra, devi solo specificare il nome squadra e il numero della serie in cui iscriverla!</div>';
			echo '<table id="">';
				echo '<tr>';
					echo '<td><input type="text" name="new_team_name" id="new_team_name" style="margin-right:10px;margin-left:5px;" value="" size="15"/></td>';
					echo '<td style="width:10%;"><span id="new_team_check_name" class="padding5px">CHECK</span></td>';
					echo '<td style="width:14%;">';
						echo '<select class="sel_base" id="NT_sel">';
							echo '<option value="DEF">Numero Serie</option>';
							//for($i=1;$i<=8;$i++){
							//	echo '<option>'.$i.'</option>';
							//}
						echo '</select>';
					echo '</td>';
					echo '<td>Nome Squadra: minimo 3 caratteri massimo 20. </br> Solo lettere, numeri o i simboli "_" e "-". Gli spazi saranno sostituiti dal simbolo "_"</td>';
				echo '</tr>';
			echo '</table>';
		CLOSE_FRAME_STEP_DIV();
		
		OPEN_FRAME_STEP_DIV("STEP 4: CREA LEGA!","#000000","FFFFFF");
			echo '<div style="margin:10px;">';
				echo 'Se gli input sono corretti crea la tua lega! Successivamente potrai: iscrivere la tua squadra, invitare le altre, caricare il logo, scegliere i vari dettagli bonus/malus, le competizioni da giocare
				e tanto altro!';
			echo '</div>';
			echo '<div id="new_lge_status" style="margin:5px auto;text-align:center;">';
				echo 'Eventuali problemi verranno riscontrati qui!';
			echo '</div>';
			DIV_BUTTON_LOGO("CREA","create_new_lge","");
		CLOSE_FRAME_STEP_DIV();
		//Call script to check team name
		new_team_check_name();
		//Call script to check series choice
		new_series_check();
		//Call script to check series team
		new_series_team_check();
		
	echo '</div>';
}

function PAGE_SIGN_TEAM(){
	OPEN_FRAME_STEP_DIV("ISCRIVI SQUADRA","#000000","FFFFFF");
		echo '<table>';
			echo '<tr>';
				echo '<td style="padding:10px 20px;">Inserisci il codice alfanumerico che ti ha dato l&apos;admin</td>';
				echo '<td style="padding:10px 20px;"><span id="sign_team_check_code" class="padding5px">CHECK</span></td>';
				echo '<td style="padding:10px 20px;"><input type="text" name="sign_team_code" id="sign_team_code" style="margin:auto;" value="" size="15"/></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="padding:10px 20px;">Inserisci il nome squadra, minimo 3 caratteri massimo 20.</br> Solo lettere, numeri e i simboli "_" e "-".</td>';
				echo '<td style="padding:10px 20px;"><span id="sign_team_check_name" class="padding5px">CHECK</span></td>';
				echo '<td style="padding:10px 20px 20px 20px ;"><input type="text" name="sign_team_name" id="sign_team_name" style="margin:auto;" value="" size="15"/></td>';
			echo '</tr>';
		echo '</table>';
			echo '<div id="sign_team_status"></div>';
			echo '<div>';
					DIV_BUTTON_LOGO("ISCRIVI","sign_team","");							
			echo '</div>';
	CLOSE_FRAME_STEP_DIV();
	//CHECK 
	$codes=GET_LEAGUES_CODES();
	//print_r($codes);
	sign_team_check_code($codes);
	sign_team_check_name();

}

function HOME_PAGE_NO_USR(){
	echo '<div id="PAPER_HOME">';
	echo '<div style="margin:20px;">';
	/*	echo 'Caro Fantallenatore, </br>';
		echo '</br>';
		echo 'Comincia qui la tua fantacarriera manageriale! </br>';
		echo '</br>';
		echo 'Prima cosa: su questo sito, ad altissimo livello di personalizzazione, potrai giocare completamente gratis utilizzando voti e quotazioni della nostra redazione. 
		I pachetti base gratuiti includono tutto il necessario per fare un fantacalcio classico!</br></br>';
		echo 'Ma se vorrai, potrai acquistare i pacchetti professional per tutta la tua Lega a prezzi bassissimi. Solo su Fantacarriera ti offriamo la possibilit&agrave; di costruire
		la tua carriera usufruendo dell&apos;indice allenatore, del ranking per le squadre della tua lega, della pnachina d&apos;oro e tante altr novit&agrave;</br>';*/
	echo '</div>';
	echo '</div>';
	
}

function PAGE_HANDLE_LGE(){
	OPEN_FRAME_STEP_DIV("GESTISCI LEGA","#000000","FFFFFF");

	CLOSE_FRAME_STEP_DIV();
}
?>
