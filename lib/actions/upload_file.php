<?php
/*
 * @file upload_file.php
 * @usage 上传文件
 * Created on 2010-12-9
 *
 * @package on Knock-Cool-Image.lib.actions
 * @author zhuhaofeng
 * @copyright 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include(realpath("./")."/lib/MySQL.php");

 function changeavatar(){
 	return uploadfile(0);
 }
 function uploadfile($param){
 	 if($param==0){$file="avatar";}
	 if(is_uploaded_file($_FILES[$file]['tmp_name'])){
	    $Filedata = $_FILES["Filedata"];
		$name = $Filedata['name'];
	 	$type = $Filedata['type'];
	 	$size = $Filedata['size'];
	 	$tmp_name = $Filedata['tmp_name'];
	 	$error = $Filedata['error'];

		 if($size>=30000){
		  	exit('您上传的文件大小超过限定');
		 }
		 switch($type){
		  	case 'image/pjpeg' : $nameback='.jpg';
		  						break;
			case 'image/jpeg' : $nameback='.jpg';
								break;
			case 'image/gif' : $nameback='.gif';
			 					break;
			case 'image/png' : $nameback='.png';
			  					break;
			case 'image/bmp' : $nameback='.bmp';
			  					break;
			case exit('can not recoginized');

	 	}
	 	$link=connect();
	 	$db=mysql_select_db("user_db");
	 	if($param==0){$dir="data/avatr/";}
 		if($nameback && $error==0){
  			$filename= "".$_SESSION['email']."". $nameback;
  			$fileplace="".$dir."" . $filename;
  			$fileroot=$dir;
  			//file_put_contents("catcah.txt",$tmp_name);
 		    move_uploaded_file($tmp_name, $fileplace);
  			$username = mysql_real_escape_string($table);
  			if($param==0){
  				return mysql_query("update userinfo set avatar='".$fileplace."' where uid=".$_SESSION['user']."",$link);
  			}else if($param==1)
 			 	return mysql_query("insert photo");
 		}else
 		return false;
	}else
		return false;
 }
?>
