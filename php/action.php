<?php
/*
 * action.php
 * Contain all the action to connect with the webpage
 * @package Knock-Cool-Image/php
 * @author zhuhaofeng
 * @copyright 2010
 * @version 0.1
 * @access public
 */
include("Container.php");

if(isset ($_POST['exit']))
{
	$temp=new Container(0);
	$temp->userexit();
}

if(isset ($_POST['search']))
{
	$temp=new Container(1);
}
?>
