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
		alert("��������ȷ��E-MAIL��ַ");
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
		alert("�������½���룡");
		return false;
	}
	if(pw2 == "")
	{
		alert("�������ظ����룡");
		return false;
	}else if(pw != pw2)
	{
		alert("�ظ��������¼���벻��ͬ��");
		return false;
	}
	if(pw.length<6)
	{
		alert("���볤��С��6������������");
		return false;
	}
	return true;
}
function checkname()
{
	var name=document.getElementById('name').value;
	if (name == "") 
	{ 
		alert("�������ǳ�");  
		return false;
	}
	return true;
}
function checkpsquestion()
{
	var pwq=document.getElementById('psquestion').value;
	if(pwq == "")
	{
		alert("�������ܱ�����");
		return false;
	}
	if(pwq.length<3)
	{
		alert("�ܱ����ⳤ��С��3������������");
		return false;
	}
	return true;
}
function checkpsanswer()
{
	var pwa=document.getElementById('psanswer').value;
	if(pwa == "")
	{
		alert("�������ܱ������");
		return false;
	}
	if(pwa.length<4)
	{
		alert("�ܱ��𰸳���С��4������������");
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
		alert("����������");
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