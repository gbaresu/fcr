<?php

function reg_check_uname(){
	 global $GLOBAL_NMIN_UNAME;global $GLOBAL_NMAX_UNAME;
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_uname='.$GLOBAL_NMIN_UNAME.';';
		echo 'var max_val_uname='.$GLOBAL_NMAX_UNAME.';';
		echo 'var user = addnuform.regusername.value;';
	    echo 'var all_char="1, ,2,3,4,5,6,7,8,9,0,Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,_,-";';
	    echo 'var all_char_arr=all_char.split(",");';
		echo '$("#regusername").keyup(function(){
			var user = addnuform.regusername.value;
			if (event.keyCode == 16) return;
			var num=0;
			for (var i = 0, len = user.length; i < len; i++) {
				res=jQuery.inArray(user[i],all_char_arr);
				if(res==-1) num++;
			}
			if(num>0 || user.length<min_val_uname || user.length>max_val_uname){
				$("#reg_check_uname").css("background-color","red");
				$("#reg_check_uname").css("color","white");
				$("#reg_check_uname").css("font-weight","bold");
				$("#reg_check_uname").val("NO");
				return;
			} else if(num==0) {
				$("#reg_check_uname").css("background-color","green")
				$("#reg_check_uname").css("color","white");
				$("#reg_check_uname").css("font-weight","bold");
				$("#reg_check_uname").val("OK");
				return;
			}
		})';
     echo '</script>';
}

function reg_check_pass(){
	 global $GLOBAL_NMIN_PASS;global $GLOBAL_NMAX_PASS;
	 //CHECK PASSWORD IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_pass='.$GLOBAL_NMIN_PASS.';';
		echo 'var max_val_pass='.$GLOBAL_NMAX_PASS.';';
		echo 'var user = addnuform.regusername.value;';
		echo '$("#regpassword").keyup(function(){
			var pass = addnuform.regpassword.value;
			if (event.keyCode == 16) return;
			if(pass.length<min_val_pass || pass.length>max_val_pass){
				$("#reg_check_pass").css("background-color","red");	
				$("#reg_check_pass").css("color","white");
				$("#reg_check_pass").css("font-weight","bold");
				$("#reg_check_pass").val("NO");
				return;
			} else if(pass.length>=min_val_pass && pass.length<=max_val_pass) {
				$("#reg_check_pass").css("background-color","green")							
				$("#reg_check_pass").css("color","white");
				$("#reg_check_pass").css("font-weight","bold");
				$("#reg_check_pass").val("OK");
				return;
			}
		})';
     echo '</script>';
}

function reg_check_email(){
	 //CHECK EMAIL IN REGISTRATION FORM
     echo '<script>';
		echo 'var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;';
		echo '$("#regemail").keyup(function(){
			var email = addnuform.regemail.value;
			if(filter.test(email)) {
				$("#reg_check_email").css("background-color","green");
				$("#reg_check_email").css("color","white");
				$("#reg_check_email").css("font-weight","bold");
				$("#reg_check_email").val("OK");
				return;
			} else {
				$("#reg_check_email").css("background-color","red");
				$("#reg_check_email").css("color","white");
				$("#reg_check_email").css("font-weight","bold");
				$("#reg_check_email").val("NO");
				return;
			}
		});';
		echo '</script>';
}

function new_lge_check_name(){
	 global $GLOBAL_NMIN_LNAME;global $GLOBAL_NMAX_LNAME;
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_lname='.$GLOBAL_NMIN_LNAME.';';
		echo 'var max_val_lname='.$GLOBAL_NMAX_LNAME.';';
		echo 'var lge_name = new_lge_form.new_lge_name.value;';
	    echo 'var all_char="1, ,2,3,4,5,6,7,8,9,0,Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,_,-";';
	    echo 'var all_char_arr=all_char.split(",");';
		echo '$("#new_lge_name").keyup(function(){
			var  lge_name = new_lge_form.new_lge_name.value;
			if (event.keyCode == 16) return;
			var num=0;
			for (var i = 0, len = lge_name.length; i < len; i++) {
				res=jQuery.inArray(lge_name[i],all_char_arr);
				if(res==-1) num++;
			}
			if(num>0 || lge_name.length<min_val_lname || lge_name.length>max_val_lname){
				$("#new_lge_check_name").css("background-color","red");
				$("#new_lge_check_name").css("color","white");
				$("#new_lge_check_name").css("font-weight","bold");
				$("#new_lge_check_name").val("NO");
				return;
			} else if(num==0) {
				$("#new_lge_check_name").css("background-color","green")
				$("#new_lge_check_name").css("color","white");
				$("#new_lge_check_name").css("font-weight","bold");
				$("#new_lge_check_name").val("OK");
				return;
			}
		});';
     echo '</script>';
}

function new_team_check_name(){
	 global $GLOBAL_NMIN_TNAME;global $GLOBAL_NMAX_TNAME;
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_tname='.$GLOBAL_NMIN_TNAME.';';
		echo 'var max_val_tname='.$GLOBAL_NMAX_TNAME.';';
		echo 'var team_name = $("#new_team_name").val();';
	    echo 'var all_char="1, ,2,3,4,5,6,7,8,9,0,Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,_,-";';
	    echo 'var all_char_arr=all_char.split(",");';
		echo '$("#new_team_name").keyup(function(){
			var  team_name = $("#new_team_name").val();
			if (event.keyCode == 16) return;
			var numt=0;
			for (var i = 0, len = team_name.length; i < len; i++) {
				res=jQuery.inArray(team_name[i],all_char_arr);
				if(res==-1) numt++;
			}
			if(numt>0 || team_name.length<min_val_tname || team_name.length>max_val_tname){
				$("#new_team_check_name").css("background-color","red");
				$("#new_team_check_name").css("color","white");
				$("#new_team_check_name").css("font-weight","bold");
				$("#new_team_check_name").val("NO");
				return;
			} else if(numt==0) {
				$("#new_team_check_name").css("background-color","green")
				$("#new_team_check_name").css("color","white");
				$("#new_team_check_name").css("font-weight","bold");
				$("#new_team_check_name").val("OK");
				return;
			}
		});';
     echo '</script>';
}

function create_lge_num_serie(){
	global $GLOBAL_NMAX_LGE;
	//Switch on and off table elements when choosing number of series in LGE
			echo '<script>
				for(i=1;i<='.$GLOBAL_NMAX_LGE.';i++){
					$("#NL_num_serie_"+i).text("-");
					$("#NL_num_serie_"+i).css("color","red");
					$("#NL_teams_per_lge_"+i).prop("disabled",true);
					$("#NL_level_"+i).prop("disabled",true);
					$("#NL_name_serie_"+i).prop("disabled",true);
				}
				$("#NS_sel").change(function(){
					$("#DIN_TABLE").css("display","");
					NUM=$("#NS_sel").val();
					for(i='.$GLOBAL_NMAX_LGE.';i>NUM;i--){
						$("#NL_num_serie_"+i).text("-");
						$("#NL_num_serie_"+i).css("color","red");
						$("#NL_teams_per_lge_"+i).prop("disabled",true);
						$("#NL_level_"+i).prop("disabled",true);
						$("#NL_name_serie_"+i).prop("disabled",true);
					}
					for(i=1;i<=NUM;i++){
						$("#NL_num_serie_"+i).text(i);
						$("#NL_num_serie_"+i).css("color","red");
						$("#NL_num_serie_"+i).css("font-weight","bold");
						$("#NL_teams_per_lge_"+i).prop("disabled",false);
						$("#NL_name_serie_"+i).prop("disabled",false);
						$("#NL_level_"+i).prop("disabled",false);
					}
					if(NUM=="NUM") {
						for(i=1;i<='.$GLOBAL_NMAX_LGE.';i++){
							$("#NL_num_serie_"+i).text("-");
							$("#NL_num_serie_"+i).css("color","red");
							$("#NL_num_serie_"+i).css("font-weight","bold");
							$("#NL_teams_per_lge_"+i).prop("disabled",true);
							$("#NL_level_"+i).prop("disabled",true);
							$("#NL_name_serie_"+i).prop("disabled",true);
						}
					}
					for(i='.$GLOBAL_NMAX_LGE.';i>NUM;i--){
						$("#NT_sel").find("option").remove().end().append($("<option>Numero Serie</option>").attr("value","DEF"));					
					}
					for(i=1;i<=NUM;i++){
						$("#NT_sel").append($("<option></option>").attr("value",i).text(i));
					}
				});
			</script>';	
}

function new_lge_check_series_name(){
	 global $GLOBAL_NMIN_SNAME;global $GLOBAL_NMAX_SNAME;global $GLOBAL_NMAX_LGE;
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_sname='.$GLOBAL_NMIN_SNAME.';';
		echo 'var max_val_sname='.$GLOBAL_NMAX_SNAME.';';
	    echo 'var all_char="1, ,2,3,4,5,6,7,8,9,0,Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,_,-";';
	    echo 'var all_char_arr=all_char.split(",");';
	    
	    for($j=1;$j<=$GLOBAL_NMAX_LGE;$j++){
			echo 'lge_name'.$j.' = $("#NL_name_serie_'.$j.'").val();';
			echo '$("#NL_name_serie_'.$j.'").keyup(function(){
				var  lge_name'.$j.' = $("#NL_name_serie_'.$j.'").val();
				if (event.keyCode == 16) return;
				var num'.$j.'=0;
				for (var i = 0, len = lge_name'.$j.'.length; i < len; i++) {
					res'.$j.'=jQuery.inArray(lge_name'.$j.'[i],all_char_arr);
					if(res'.$j.'==-1) num'.$j.'++;
				}
				if(num'.$j.'>0 || lge_name'.$j.'.length<min_val_sname || lge_name'.$j.'.length>max_val_sname){
					$("#NL_num_serie_'.$j.'").css("color","red");
					$("#NL_num_serie_'.$j.'").css("font-weight","bold");
					$("#NL_num_serie_'.$j.'").css("font-size","11px");
					$("#NL_num_serie_'.$j.'").val("NO");
					return;
				} else if(num'.$j.'==0) {
					$("#NL_num_serie_'.$j.'").css("color","green");
					$("#NL_num_serie_'.$j.'").css("font-weight","bold");
					$("#NL_num_serie_'.$j.'").css("font-size","13px");
					$("#NL_num_serie_'.$j.'").val("OK");
					return;
				}
			});';
		}
     echo '</script>';
}

function new_series_check(){
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var nmax=$("#NS_sel").val();';
		echo '$("#NS_sel").change(function(){
			var nmax=$("#NS_sel").val();
			if(nmax=="NUM"){
				$("#new_series_check").css("background-color","red");
				$("#new_series_check").css("color","white");
				$("#new_series_check").css("font-weight","bold");
			} else {
				$("#new_series_check").css("background-color","green");
				$("#new_series_check").css("color","white");
				$("#new_series_check").css("font-weight","bold");			
			}
			});';
     echo '</script>';
}

function new_series_team_check(){
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var nmaxt=$("#NT_sel").val();';
		echo '$("#NT_sel").change(function(){
			var nmaxt=$("#NT_sel").val();
			if(nmaxt=="DEF"){
				$("#NT_sel").css("color","red");
			} else {
				$("#NT_sel").css("color","black");
			}
			});';
     echo '</script>';
}

function sign_team_check_name(){
	 global $GLOBAL_NMIN_TNAME;global $GLOBAL_NMAX_TNAME;
	 //CHECK USERNAME IN REGISTRATION FORM
     echo '<script>';
		echo 'var min_val_tname='.$GLOBAL_NMIN_TNAME.';';
		echo 'var max_val_tname='.$GLOBAL_NMAX_TNAME.';';
		echo 'var team_name = $("#sign_team_name").val();';
	    echo 'var all_char="1, ,2,3,4,5,6,7,8,9,0,Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,q,w,e,r,t,y,u,i,o,p,a,s,d,f,g,h,j,k,l,z,x,c,v,b,n,m,_,-";';
	    echo 'var all_char_arr=all_char.split(",");';
		echo '$("#sign_team_name").keyup(function(){
			var  team_name = $("#sign_team_name").val();
			if (event.keyCode == 16) return;
			var numt=0;
			for (var i = 0, len = team_name.length; i < len; i++) {
				res=jQuery.inArray(team_name[i],all_char_arr);
				if(res==-1) numt++;
			}
			if(numt>0 || team_name.length<min_val_tname || team_name.length>max_val_tname){
				$("#sign_team_check_name").css("background-color","red");
				$("#sign_team_check_name").css("color","white");
				$("#sign_team_check_name").css("font-weight","bold");
				$("#sign_team_check_name").val("NO");
				return;
			} else if(numt==0) {
				$("#sign_team_check_name").css("background-color","green")
				$("#sign_team_check_name").css("color","white");
				$("#sign_team_check_name").css("font-weight","bold");
				$("#sign_team_check_name").val("OK");
				return;
			}
		});';
     echo '</script>';
}

function sign_team_check_code($codes){
	echo '<script>';
	echo '$("#sign_team_code").bind("keyup input",function(){';
		echo 'var inputcode=$("#sign_team_code").val();';
		echo '
				$("#sign_team_check_code").css("background-color","red");
				$("#sign_team_check_code").css("color","white");
				$("#sign_team_check_code").css("font-weight","bold");
				$("#sign_team_check_code").val("NO");';
		foreach($codes as $val){
			echo 'if(inputcode=="'.$val.'"){
				$("#sign_team_check_code").css("background-color","green");
				$("#sign_team_check_code").css("color","white");
				$("#sign_team_check_code").css("font-weight","bold");
				$("#sign_team_check_code").val("YES");
			}';
		}
	echo '});';
	echo '</script>';
}


function toggle_edit($txt1,$txt2){
	//TOGGLE EDIT BUTTON IN PROFILE
	echo '<script>';
		echo '$("#'.$txt1.'").click(function(){';
			echo 'var newt=$("#'.$txt2.'_INPUT").val();';
			echo '$("#'.$txt2.'_TXT").toggle();';
			echo '$("#'.$txt2.'_TXT").text(newt);';
			echo '$("#'.$txt2.'_INPUT").toggle();';
		echo '});';
	echo '</script>';
	
}

?>
