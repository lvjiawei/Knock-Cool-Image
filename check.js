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
		alert("请输入正确的E-MAIL地址");
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
		alert("请输入登陆密码！");
		return false;
	}
	if(pw2 == "")
	{
		alert("请输入重复密码！");
		return false;
	}else if(pw != pw2)
	{
		alert("重复密码与登录密码不相同！");
		return false;
	}
	if(pw.length<6)
	{
		alert("密码长度小于6，请重新输入");
		return false;
	}
	return true;
}
function checkname()
{
	var name=document.getElementById('name').value;
	if (name == "") 
	{ 
		alert("请输入昵称");  
		return false;
	}
	return true;
}
function checkpsquestion()
{
	var pwq=document.getElementById('psquestion').value;
	if(pwq == "")
	{
		alert("请输入密保问题");
		return false;
	}
	if(pwq.length<3)
	{
		alert("密保问题长度小于3，请重新输入");
		return false;
	}
	return true;
}
function checkpsanswer()
{
	var pwa=document.getElementById('psanswer').value;
	if(pwa == "")
	{
		alert("请输入密保问题答案");
		return false;
	}
	if(pwa.length<4)
	{
		alert("密保答案长度小于4，请重新输入");
		return false;
	}
	return true;
}
function CheckIfUsed()
{
	var email=document.getElementById('email').value;
	window.open("usercheck.php?email="+email,"newframe","width=200,height=10,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
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
		alert("请输入密码");
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