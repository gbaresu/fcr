//does login
function create_new_lge(){
	
	var check_sname=new Array();
	var snumber=new Array();
	var sname=new Array();
	var spar=new Array();
	var slev=new Array();
	
	//CHECK EVERYTHING IS OK
	var NOPE_N=0;
	var NOPE_S=0;
	var NOPE_T=0;
	var NOPE_SC=0;
	var NOPE_ST=0;
	
	//CHECK LEAGUE NAME IS OK
	var new_lge_check_name=$("#new_lge_check_name").val();
	if(new_lge_check_name!="OK") NOPE_N=1;
	//CHECK TEAM NAME IS OK
	var new_team_check_name=$("#new_team_check_name").val();
	if(new_team_check_name!="OK") NOPE_T=1;
	//CHECK SEREIS IS CHOSEN
	var nmax=$("#NS_sel").val();
	if(nmax=="NUM") NOPE_SC=1;
	//CHECK TEAM SERIES IS OK
	var nmax2=$("#NT_sel").val();
	if(nmax2=="DEF") NOPE_ST=1;
	
	for(i=1;i<=nmax;i++){
		check_sname[i]=$('#NL_num_serie_'+i).val();
		if(check_sname[i]!="OK") NOPE_S++;
	}

	if(NOPE_S==0 && NOPE_N==0 && NOPE_T==0 && NOPE_SC==0 && NOPE_ST==0){
		var new_lge_name=$("#new_lge_name").val();
		for(i=1;i<=nmax;i++){
			snumber[i]=i;
			spar[i]=$("#NL_teams_per_lge_"+i).val();
			sname[i]=$("#NL_name_serie_"+i).val();
			slev[i]=$("#NL_level_"+i).val();
		}
		team_name=$("#new_team_name").val();

		sname[0]=0;
		s_sname=sname.sort();
		vold="%";
		equal=0;
		for (i=1;i<=nmax;i++){
			if(s_sname[i]==vold) equal++; 
			vold=s_sname[i];
		}
		if(equal>0){
			$("#new_lge_status").html("I nomi delle serie all'interno della Lega devono essere diversi.");
			$("#new_lge_status").css("color","red");			
		} else {
			var datastring={func:"new_lge_create",lge_name:new_lge_name,nser:nmax,snumber:snumber,spar:spar,sname:sname,slev:slev,team:team_name,nisc:nmax2};
			$.ajax({
				url: "POST/POST_sys.php",
				global: false,
				type: "POST",
				data: datastring,
				success: function(msg){
					if(msg=="OK"){
						$("#new_lge_status").css("color","green");
						$("#new_lge_status").html("La tua lega &egrave; stata creata! Attendi mentre ti reindirizzo alla home.");
						window.setTimeout(function(){window.location.replace("/fcr/main.php")},3000);					
					} else {
						$("#new_lge_status").css("color","red");
						$("#new_lge_status").text(msg);
					}
				},
				error: function(msg){
					$("#new_lge_status").css("color","red");
					$("#new_lge_status").html("Impossibile inoltrare la richiesta: riprova tra poco o contatta gli amministratori!"+msg);
					alert(msg);
				}
			});
		}
	} else {
		$("#new_lge_status").html("Ricontrolla i valori evidenziati in rosso.");
		$("#new_lge_status").css("color","red");
		if(NOPE_N!=0) $("#new_lge_check_name").css("background-color","red");
		if(NOPE_N!=0) $("#new_lge_check_name").css("color","white");
		if(NOPE_N!=0) $("#new_lge_check_name").css("font-weight","bold");
		if(NOPE_T!=0) $("#new_team_check_name").css("background-color","red");
		if(NOPE_T!=0) $("#new_team_check_name").css("color","white");
		if(NOPE_T!=0) $("#new_team_check_name").css("font-weight","bold");
		if(NOPE_SC!=0) $("#new_series_check").css("background-color","red");
		if(NOPE_SC!=0) $("#new_series_check").css("color","white");
		if(NOPE_SC!=0) $("#new_series_check").css("font-weight","bold");
		if(NOPE_ST!=0) $("#NT_sel").css("color","red");
	}
}

function sign_team(){
	var code=$("#sign_team_code").val();
	var tname=$("#sign_team_name").val();
		
	datastring={func:"sign_team",code:code,tname:tname};
	$.ajax({
		url: "POST/POST_sys.php",
		global: false,
		type: "POST",
		data: datastring,
		success: function(msg){
			if(msg=="OK"){
				window.setTimeout(function(){window.location.replace("/fcr/main.php?page=profile")},1000);					
			} else {
				$("#sign_team_status").html(msg);
			}
		},
		error: function(msg){
			alert(msg);
		}
		
		
	});
}

//SAVE EDIT 1
function SAVE_EDIT_PROF_1(){
	var name=$("#PROF_NAME_INPUT").val();
	var sname=$("#PROF_SNAME_INPUT").val();
	var birth=$("#PROF_BIRTH_INPUT").val();
	var region=$("#PROF_REGION_INPUT").val();
	var def_team=$("#PROF_MOD_DEF_TEAM").val();

	var datastring={func:"save_edit_prof_1",name:name,sname:sname,birth:birth,region:region,def_team:def_team};
	$.ajax({
		url: "POST/POST_sys.php",
		global: false,
		type: "POST",
		data: datastring,
		success: function(msg){
			if(msg=="OK"){
				window.setTimeout(function(){window.location.replace("/fcr/main.php?page=profile")},1000);					
			} else {
				alert(msg+"A");
			}
		},
		error: function(msg){
			alert(msg);
		}
	});	
}
//SAVE EDIT 2
function SAVE_EDIT_PROF_2(id){
	var role=$("#PROF_ROLE_"+id).val();
	var datastring={func:"save_edit_prof_2",id_team:id,role:role};
	$.ajax({
		url: "POST/POST_sys.php",
		global: false,
		type: "POST",
		data: datastring,
		success: function(msg){
			if(msg=="OK"){
				window.setTimeout(function(){window.location.replace("/fcr/main.php?page=profile")},1000);					
			} else {
				alert(msg+"A");
			}
		},
		error: function(msg){
			alert(msg);
		}
	});	
}
