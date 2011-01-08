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
	var temp1=0;
	var temp2=0;
	if(email==""){
		alert("Email address cannot be empty!");
		return false;
	}
	for (i=0; i<email.length; i++)
	{
		if(email.charAt(i) == "@")
			temp1=i;
		if((email.charAt(i) == ".") && (i>temp1)&&(temp1!=0))
			temp2=i;
	}

	var result=email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
	if(result==null){alert("The email address is incorrected!"); return false;}
	
	if(((email.charAt(temp2+1)!="c")&&(email.charAt(temp2+2)!="o")&&(email.charAt(temp2+3)!="m"))
	&&((email.charAt(temp2+1)!="n")&&(email.charAt(temp2+2)!="e")&&(email.charAt(temp2+3)!="t"))
	&&((email.charAt(temp2+1)!="e")&&(email.charAt(temp2+2)!="d")&&(email.charAt(temp2+3)!="u"))
	&&((email.charAt(temp2+1)!="o")&&(email.charAt(temp2+2)!="r")&&(email.charAt(temp2+3)!="g"))
	&&((email.charAt(temp2+1)!="g")&&(email.charAt(temp2+2)!="o")&&(email.charAt(temp2+3)!="v")))
	{
		alert("The email address is not right!");
		return false;
	}
	return true;
}
function checkps()
{
	var pw=document.getElementById('password').value;
	var pw2=document.getElementById('password2').value;
	var re=pw.match(/^[0-9a-zA-Z\_]+$/);
	if(pw == "")
	{
		alert("Please input the password!");
		return false;
	}
	if(pw2 == "")
	{
		alert("Please input the re-type password!");
		return false;
	}else if(pw != pw2)
	{
		alert("The two password are not the same!");
		return false;
	}
	if(pw.length<6)
	{
		alert("Please input passwords longer than 6 bytes!");
		return false;
	}
	if(!re==null){
		return false;
	}
	return true;
}
function checkname()
{
	var name=document.getElementById('nickname').value;
	if (name == "")
	{
		alert("Please Input nickname!");
		return false;
	}
	return true;
}
function checkpsquestion()
{
	var pwq=document.getElementById('passquestion').value;
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
	var pwa=document.getElementById('passanswer').value;
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
	if(checkemail()){
		window.open("usercheck.php?email="+email,"newframe","width=200,height=10,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
		return true;
	}else
		return false;
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