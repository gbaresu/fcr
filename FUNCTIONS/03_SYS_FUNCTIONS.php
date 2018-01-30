<?php

function WARN_BAR($txt){
	echo '<div id="warn_bar" class="ubuntu">';
		echo $txt;
	echo '</div>';
}

function GET_LGE_CODE($id_usr,$id_lge,$id_lge_child){
	//CODE COMPOSITION
	// L-IDLGE-R1-P1-L3
	$str_symbols="ABCDEFGHIJKLMNOPQURSTUVWXYZ1234567890";
	$str_dim=strlen($str_symbols);
	
	
	//START STRING 5/10 
	$CODE="LC".sprintf("%03d",$id_lge);
	
	$rand1=rand(1,9);	
	$rand2=rand(1,9);
	//6/10
	$R2=pow($rand2,$rand1)+rand(1,9);
	while($R2>$str_dim){
		$R2=$R2-$str_dim;
	}
	$CODE.=$str_symbols[$R2];
	//7/10
	$CODE.=$rand1;
	
	$id_child=sprintf("%03d",$id_lge_child);
	$CODE.=$id_child;
	
	return $CODE;
}

function GET_MAX_ID($table,$rname){
	//GET MAX ID
	$db=getDB();
	
	$q="select MAX(".$rname.") from ".$table;
	$res=$db->query($q);
	$idarr=mysqli_fetch_row($res);
	$maxid=$idarr[0];
	
	if(mysqli_num_rows($res)==0) $maxid=0;
	
	return $maxid;
}

function GET_USR_ID($usr){
	global $user_class;global $uind_class;
	//Call this function with 0 argument if you want the connected person ID
	$sessione = new Sessione();	
	if($usr==0){$usr=$_SESSION["username"];}
	
	$usr_id=$user_class[$uind_class[$usr]]->usr_id;

	return $usr_id;
}

function PRINT_PHPINFO(){
	echo phpinfo();
}

function GET_PIC_EXT($fname){
	$ext=array(".jpg",".png");
	foreach($ext as $val){
	 $ftemp=$fname.$val;
  	 if(file_exists($ftemp)){
	  $found=true;
      break;
	 } else {
	  $found=false;
	  continue;
	 }
	}
	$ret[0]=$found;
	$ret[1]=$ftemp;
	return $ret;
}

function GET_LEAGUES_CODES(){
	$db=getDB();
	$codes=array();
	$q="select * from 01_LEAGUES_DETAIL where 1";
	$res=$db->query($q);
	while($row=mysqli_fetch_array($res)){
		array_push($codes,$row["CODE_AN"]);
	}
	return $codes;
}

?>
