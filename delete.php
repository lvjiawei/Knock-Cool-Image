<?php
@session_start();
if(isset($_SESSION['mod']) && isset($_SESSION['user'])) 
{
	if(isset($_POST['image']) && $_SESSION['mod']==1):
		require_once("./lib/MySQL.php");
		$con=connect();
		$db=mysql_select_db('user_db');
		$delete_result=mysql_query("select * from photo where image='".$_POST['image']."'",$con);
		$delete_row=mysql_fetch_array($delete_result);
		$test_result=mysql_query("select * from album where aid=".$delete_row['aid']." and uid=".$_SESSION['user']."",$con);
		$test=mysql_num_rows($test_result);
		if($test!=0){
			$delete_comment_result=@mysql_query("select * from comment where pid=".$delete_row['pid']."",$con);
			while($mid=@mysql_fetch_array($delete_comment_result,MYSQL_NUM)){
				mysql_query("delete from comment where comment.mid=".$mid[0]." Limit 1",$con);
			}
			mysql_query("delete from photo where pid=".$delete_row['pid']."",$con);
			
		}
		//mysql_close($con);
	endif;	
}
?>