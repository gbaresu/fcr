<?php

require_once(dirname(__FILE__)."/../DB/00_ACCESS_DB.php");

global $user_class;global $uind_class;
$db=getDB();

$usr=$_SESSION["username"];
$id=$user_class[$uind_class[$usr]]->usr_leagues_id;

if(sizeof($id)==0) $FLAG_NO_LEAGUE="ON"; 
//SEEK FOR LEAGUES

foreach($id as $val){
	$q="select * from 00_LEAGUES where ID_LEAGUE=".$val;
	//echo '</br></br></br></br></br>'.$q;
	$res=$db->query($q);
	while($row=mysqli_fetch_array($res)){
		$lge_id=$row["ID_LEAGUE"];
		$lge_nm=$row["NAME"];
		$lge_date=$row["DATE"];
		$lge_creator=$row["ID_CREATOR"];
		$lge_parts=$row["PARTS"];
		//INITIATE NEW LEAGUE WITH DETAILS
		$lge_class[$lge_id]=new LEAGUE($lge_id,$lge_nm,$lge_creator,$lge_parts,$lge_date);
		$lge_class[$lge_id]->lge_details($lge_id);
		$lge_class[$lge_id]->lge_cmps($lge_id,$lge_cmps);
	}
}

//DEFINE LEAGUE CLASS
//
// Quantities
//
// -- CALLED IN
//
// $lge_class[1]->lge_id;					LEAGUE ID
// $lge_class[1]->lge_name;					LEAGUE NAME
// $lge_class[1]->lge_date;					LEAGUE DATE OF REGISTRATION
// $lge_class[1]->lge_parts;				LEAGUE NUMBER OF PARTECIPANTS
// $lge_class[1]->lge_series;				LEAGUE NUMBER OF LEAGUES IN LEAGUE
// $lge_class[1]->lges_names;				ARR LEAGUE NAME OF LEAGUES [Note: lges_ not lge_]
// $lge_class[1]->lges_parts;				ARR LEAGUE NUMBER OF PARTECIPANTS IN EACH LEAGUE [Note: lges_ not lge_]
// $lge_class[1]->lge_num_comps;			LEAGUE NUMBER OF COMPETITIONS IN THE LEAGUE
// $lge_class[1]->lge_comps;				ARR LEAGUE NAME OF COMPETITIONS IN LEAGUE [Note: lges_ not lge_]
//

// To do
// Add league and trophies logo
//
class LEAGUE {
	public function __construct($id,$nm,$creat,$parts,$date){
		//BASIC INFOS
		$this->lge_id=$id;	
		$this->lge_name=$nm;	
		$this->lge_creator=$creat;	
		$this->lge_parts=$parts;	
		$this->lge_date=$date;	
	}
	public function lge_details($id){
		//CALLED: Y
		//INCLUDE OTHER INFOS
		global $db;
		$lges_names=array();$lges_parts=array();
		//INFO ABOUT THE LEAGUE ARE WRITTEN IN ONE DB COLUMN USING & AS SEPARATOR

		$qin="select * from 01_LEAGUES_DETAIL where ID_PARENT=".$id;
		$resin=$db->query($qin);
		$num=0;
		while($rowin=mysqli_fetch_array($resin)){
			$num++;
			$this->lges_names[$num]=$rowin["NAME"];
			$this->lges_parts[$num]=$rowin["PARTS"];
		}
		$this->lge_series=$num;
	}
	public function lge_cmps($id,$lge_cmps){
		//INFO ABOUT THE COMPETITIONS IN THE LEAGUE ARE WRITTEN IN ONE DB COLUMN USING & AS SEPARATOR
		$str=explode("&",$lge_cmps);
		foreach($str as $val){
			$pair=explode("%",$val);
			$pair[1]=$this->lge_check_def($pair[1],$pair[0]);
			$cmps[$pair[0]]=$pair[1];
		}
		//ADJUST FOR MULTIPLE CUP AND SUPERCUP FINALS
		$num_lge=$this->lge_leagues;
		$names=array("CLX"=>"Coppa","SLX"=>"Supercoppa");
		foreach($names as $key=>$val){
			if(array_key_exists($key,$cmps)){
				$cup=array();
				unset($cmps[$key]);
				for($i=1;$i<=$num_lge;$i++){
					$str2=$val.' '.$this->lges_names[$i-1];
					$cmps[$key.$i]=$str2;
				}
			}
		}
		$this->lge_cmps=$cmps;
		$this->lge_num_cmps=count($cmps);
	}
	private function lge_check_def($str,$str2){
		$str_out=$str;
		if($str=="DEF"){
			if($str2=="R4M"){$str_out="Ranking ".$this->lge_name;}
			//Popolare l array con tutte le supercoppe+
			if($str2=="SLX"){$str_out="Supercoppe ".$this->lge_name;}
		}
		return $str_out;
	}

}

/* PRINT OUT TO CHECK 
echo '</br></br></br>';
echo 'ID LEGA.</br>';
echo $lge_class[$lge_id]->lge_id;			
echo '</br></br>';
echo 'NOME LEGA.</br>';
echo $lge_class[$lge_id]->lge_name;					
echo '</br></br>';
echo 'DATA ISCRIZIONE LEGA.</br>';
echo $lge_class[$lge_id]->lge_date;					
echo '</br></br>';
echo 'NUMERO PARTECIPANTI.</br>';
echo $lge_class[$lge_id]->lge_parts;					
echo '</br></br>';
echo 'NUMERO SERIE.</br>';
echo $lge_class[$lge_id]->lge_series;	
echo '</br></br>';
echo 'NOMI DELLE SERIE.</br>';
print_r($lge_class[$lge_id]->lges_names);				
echo '</br></br>';
echo 'PARTECIPANTI PER OGNI SERIE.</br>';
print_r($lge_class[$lge_id]->lges_parts);
echo '</br></br>';
//*/


?>

