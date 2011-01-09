<?php 
	$aid=$_POST[a_id];
	$pid=$_POST[p_id];
	$nickname=$_POST[nickname];
	$comment=$_POST[comment];
	if(isset($_POST[comment])){
		require_once(realpath("./")."/lib/MySQL.php");
		$link=connect();
		@mysql_select_db("user_db");
		
		if(mysql_query("insert into comment (pid,text,nickname) values(".$pid.",'".$comment."','".$nickname."')",$link)){
		@mysql_close($link);
		}
	}
	Header("Location:photo.php?pid=".$pid."&aid=".$aid);
?>