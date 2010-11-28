/*
 * check.js
 * function handler container for browser checkout
 * @package: Knock-Cool-Image/js
 * @author zhuhaofeng
 * @version 0.1
 * @copyright 2010
 * @access public
 */
function checkemail()
{
	var email=document.getElementById('email').value;
	var emailerr=0;
	for (i=0; i<email.length; i++) 
	{ 
		if ((email.charAt(i) == "@") & (email.length > 5)) 
		{ 
			emailerr=emailerr+1;
		} 
	} 
	if (emailerr != 1) 
	{ 
		alert("Please input the correct e-mail address!");
		return false;
	}
	return true;
}
function checkps()
{
	var pw=document.getElementById('ps').value;
	var pw2=document.getElementById('ps2').value;
	if(pw == "")
	{
		alert("Please input the passwordï¼&#65533;");
		return false;
	}
	if(pw2 == "")
	{
		alert("Please input the re-type passwordï¼&#65533;");
		return false;
	}else if(pw != pw2)
	{
		alert("The two password are not the sameï¼&#65533;");
		return false;
	}
	if(pw.length<6)
	{
		alert("Please input passwords longer than 6 bytes!");
		return false;
	}
	return true;
}
function checkname()
{
	var name=document.getElementById('name').value;
	if (name == "") 
	{ 
		alert("Please Input nickname!");  
		return false;
	}
	return true;
}
function checkpsquestion()
{
	var pwq=document.getElementById('psquestion').value;
	if(pwq == "")
	{
		alert("Please input the question!");
		return false;
	}
	if(pwq.length<2)
	{
		alert("Please input the question longer than 4 bytes!");
		return false;
	}
	return true;
}
function checkpsanswer()
{
	var pwa=document.getElementById('psanswer').value;
	if(pwa == "")
	{
		alert("Please input the answer!");
		return false;
	}
	if(pwa.length<2)
	{
		alert("Please input the answer longer than 4 bytes");
		return false;
	}
	return true;
}
function CheckIfUsed()
{
	var email=document.getElementById('email').value;
	window.open("./php/usercheck.php?email="+email,"newframe","width=200,height=10,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
}
function checkall()
{
	if( checkemail() && checkps() && checkname() && checkpsquestion() && checkpsanswer() )
	{
		return true;
	}
	return false;
}
function checkpw()
{
	var pw=document.getElementById('pw').value;
	if(pw == "")
	{
		alert("Please input the password!");
		return false;
	}
	return true;
}
function signin_check()
{
	if( checkpw() && checkemail() )
	{
		return true;
	}
	return false;
}