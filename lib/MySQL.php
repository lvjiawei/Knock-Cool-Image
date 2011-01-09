<?php
/**
  * MySQL.php
  * connect to the mysql and get the query result
  * @package: Knock-Cool-Image/lib
  * @author zhuhaofeng
  * @version 0.1
  * @copyright 2010
  * @access public
  **/

function connect(){
	$link=mysql_connect("localhost","root","");
	if(!$link)die("Cannot connect:".mysql_error());
	else
		return $link;
}
?>