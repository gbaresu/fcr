<?php

function upload($folder,$file_id){
	global $path;
//	PRINT_PHPINFO();

	if(isset($_FILES['image'])){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      
      if(empty($errors)==true) {
		 unlink("../fcr/PIC/".$folder."/".$file_id.".png");
		 unlink("../fcr/PIC/".$folder."/".$file_id.".jpg");
		 $moved="../fcr/PIC/".$folder."/".$file_id.".".$file_ext;
         move_uploaded_file($file_tmp,$moved);
         echo '</br>'.$moved.'</br>';
         //sleep(20);
         print_r($_FILES);
      }else{
         print_r($errors);
      }
   }


echo '<html>
   <body>
      <form id="zzz" action="" method = "POST" enctype = "multipart/form-data" autocomplete="off">
         <input type="file" name="image" id="PROF_upload_choose"/>
         <input id="" type="submit"/>
         <ul>';
echo "         
            <li>Sent file:".$_FILES['image']['name']."</li>
            <li>File size:".$_FILES['image']['size']."</li>
            <li>File type:".$_FILES['image']['type']."</li>
         </ul> ";
echo '
			
      </form>
      
   </body>
</html>';

echo '<script>';
echo "$('#zzz').submit(function() {
    if(confirm('Click OK to continue?')){
	window.location.replace('/fcr/main.php?page=success');
	}
});";
echo '</script>';

}

?>
