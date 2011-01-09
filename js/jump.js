/*
 * jump.js
 * Jump to other webpages
 * @package: Knock-Cool-Image/js
 * @author zhuhaofeng
 * @version 0.1
 * @copyright 2010
 * @access public
 */
function forget_jump()
{
	var action="forget";
	window.open("action.php?action="+action,"newframe","width=400,height=400,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
}
function signup_jump(time)
{
	window.setTimeout("window.location.href='signup.html'", time);
}
function signin_jump(time)
{
	window.setTimeout("window.location.href='index.php'",time);
}
function signin_jump1(time)
{
	window.setTimeout("window.location.href='index.php'",time);
}
function user_jump(time)
{
	window.setTimeout("window.location.href='user.php'",time);
}