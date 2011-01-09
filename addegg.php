<?php
if(!isset($_SESSION))@session_start();
//mysql_query("update shared set third='".$_POST['share3']."' where uid=".$_SESSION['user']."",$link);
if(isset($_SESSION['mod']) && isset($_SESSION['user'])) 
{
	if(isset($_POST['image']) && $_SESSION['mod']==1):
		require_once("./lib/MySQL.php");
		$con=connect();
		$db=mysql_select_db('user_db');
		$addegg_result=mysql_query("select * from photo where image='".$_POST['image']."'",$con);
		$addegg_row=mysql_fetch_array($addegg_result);
		$test_result=mysql_query("select * from album where aid=".$addegg_row['aid']." and uid=".$_SESSION['user']."",$con);
		$test=mysql_num_rows($test_result);
		if($test!=0){
			$eggnum=$addegg_row['eggs']+1;
			mysql_query("update photo set eggs =". $eggnum." where pid=".$addegg_row['pid']."",$con);
		}
		mysql_close();
	endif;	
}
?>