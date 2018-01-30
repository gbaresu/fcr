//does login
function login(){

 var username = $.trim($("#login-username").val());
 var password = $.sha256($("#login-password").val());
 
 var datastring = {func:"login",user:username,pass:password};
 if(username!="" && password!=""){
  $.ajax({
        url: 'POST/POST_functions.php',global: false,type: 'POST',data: datastring,
        success: function(msg){
		if(msg=="OK"){
		 $("#fb_login").css("display","block");
		 $("#fb_login").css("color","green");
		 $("#fb_login").text("Ciao "+username+"!");
		 $.ajax({
				url: 'POST/POST_functions.php',global: false,type: 'POST',data: 'func=getlogindone',
				success: function(){
				},
				complete: function(){
                    window.setTimeout(function(){window.location.replace("/fcr/main.php")},1000)					
                }
				});		
		} else if (msg=="NO"){
		 $("#fb_login").css("color","red");
		 $("#fb_login").text("Username e/o password non riconosciuti!");
		} else {
		 $("#fb_login").css("display","visible");
		 $("#fb_login").text(msg);
		}
	}
	});
	} else {
	 $("#fb_login").css("display","block");
	 $("#fb_login").css("color","red");
	 $("#fb_login").text("Non hai inserito nulla!");
	}
}

function logout(){
	//var sPath = window.location.pathname;
//	var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
	var datastring = {func:"logout"};
	$.ajax({
		url: 'POST/POST_functions.php',
		global: false,
		type: 'POST',
		data: datastring,
		success: function(msg){
			$.ajax({
				url: 'POST/POST_functions.php',
				global: false,
				type: 'POST',
				data: 'func=getloginform',
				success: function(text){
					window.location.reload(true);
					//alert(text);
					//$("#login").html(text);
					},
				complete: function(){
					window.location.reload(true);
				}
				});
			}
	});
}

function go_to_reg(){
	window.location.href = 'main.php?page=reg';
}

function go_to_prof(){
	window.location.href = 'main.php?page=profile';
}

function go_to_new_lge(){
	window.location.href = 'main.php?page=new_lge';
}

function go_to_sign_team(){
	window.location.href = 'main.php?page=sign_team';
}

function home(){
	window.location.href = 'main.php';
}

function nu_submit(){
	
	var min_val=3;
	
	val_uname=$("#reg_check_uname").val();
	val_pass=$("#reg_check_pass").val();
	val_email=$("#reg_check_email").val();

	if(val_uname=="OK" && val_pass=="OK" && val_email=="OK"){
		var user = addnuform.regusername.value;
		var pass = $.sha256(addnuform.regpassword.value);
		var email = addnuform.regemail.value;
		$("#out_reg").text("Attendi mentre ti registro!");		
		$("#out_reg").css("color","green");
	} else if(val_uname!="OK"){
		$("#out_reg").text("Lo username non va bene!");		
		$("#out_reg").css("color","red");
	} else if(val_pass!="OK"){
		$("#out_reg").text("La password non va bene!");		
		$("#out_reg").css("color","red");		
	} else if(val_email!="OK"){
		$("#out_reg").text("Per favore, inserisci un indirizzo e-mail corretto!");		
		$("#out_reg").css("color","red");		
	}

	var datastring = {func:"nu_submit",user:user,pass:pass,email:email};
	$.ajax({
		url: "POST/POST_functions.php",
		global: false,
		type: "POST",
		data: datastring,
		success: function(msg){
				if(msg=="OK"){
					$("#out_reg").css("color","green");
					$("#out_reg").html("Sei stato registrato! Attendi mentre ti reindirizzo alla home dove potrai fare login!");
                    window.setTimeout(function(){window.location.replace("/fcr/main.php")},5000)					
			    } else {
					$("#out_reg").css("color","red");
					$("#out_reg").text(msg);
				}
			},
		error: function(msg){
				$("#out_reg").css("color","red");
				$("#out_reg").html("Impossibile inoltrare la richiesta: contatta <a href='mailto:lega4mori@gmail.com'>ggg</a>"+msg);
			    alert(msg);
				}
	});
}

function usr_ch_team(nt,ot){
	if(nt==ot){
		window.setTimeout(function(){location.reload(true)},500);					
	} else {
		var datastring = {func:"usr_ch_team",told:ot,tnew:nt};
		$.ajax({
			url: "POST/POST_functions.php",
			global: false,
			type: "POST",
			data: datastring,
			success: function(msg){
				if(msg=="OK"){
                    window.setTimeout(function(){window.location.replace("/fcr/main.php")},500)					
			    } else {
					alert(msg);
				}
			},
			error: function(msg){
				alert(msg+" ERR");
			}	
	});
		
	}
}
