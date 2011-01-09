<?php
/*
 * albumController.php
 * function handler container
 * @package: Knock-Cool-Image/lib
 * @author zhuhaofeng
 * @version 0.1
 * @copyright 2010
 * @access public
 */
 class AlbumController{
	public $_link;
	private $_uid;
	private $_aid;
	public $_message=null;
	public $_url=null;
	private $_albums=array();

	function AlbumController($uid)
	{
		$this->_uid=$uid;
	}
	public function getUid(){
		return $this->_uid;
	}
	private function getAlbums()
	{
		
	}
	
	public function isEmpty($para)
	{
		if($para==null||$para=="")
			return true;
		else
			return false;
	}
	
	public function isPost($para)
	{
		if(isset($_POST[$para]))
			return true;
		else
			return false;
	}
	
	public function addNewAlbum($tag)
	{
		if(!$this->isEmpty($tag))
		{
			//$this->setUrl("user.php?uid=2");
			if($this->addalbum($tag)){
				$this->setMessage("A new album is created!");
				$this->setUrl("user.php?uid=".$this->_uid);
				return true;
			}
			//$this->setUrl("user.php?uid=2");
		}	
		$this->setMessage("Failed to create a new album");
		$this->setUrl("user.php?uid=".$this->_uid);
		return false;
	}

	public function getnewalbumHTML()
	{
		return "<head>
				   <title>My Pictrue</title>
				   <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
				   <link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
				   <script type=\"text/javascript\">" .
						"function checkanswer(){
							var tag=document.getElementById(\'tag\').value;" .
							"if(tag==\"\")return false;" .
							"else return true;
						}" .
					"</script>
			</head>
			<body>
				<div class=\"signback\">
				<div class=\"Signback\">
				<form action=\"action.php\" method=\"post\" onSubmit=\"return checkanswer()\">
					<table>
					<tr><td id=\"orange\">Tips:</td><td><br></td>".
					"<tr><td></td><td>Type in your album's tag and then create a new album.</td></tr>
					<tr><td>Tag:</td><td><input type=\"hidden\" name=\"action\" id=\"action\" value=\"newalbum\"><input type=\"text\" name=\"tag\" id=\"tag\" class=\"text\"></td></tr>
					<tr><td></td><td><input type=\"submit\" value=\"Create new album\" class=\"albumbutton\"></td>
					</tr>
					<tr><td></td><td><input type=\"button\" value=\"Do Nothing\" class=\"albumbutton2\" onClick=\"history.go(-1)\">
					</tr>
				</table>
				</form>
				</div>
				</div>
			</body>";
	}

	public function setUrl($url)
	{
		$this->_url=$url;
	}

	public function setMessage($message)
	{
		$this->_message=$message;
	}

	public function getMessage()
	{
		return "<head>
						<title>My Pictrue</title>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
						<script type\"text/javascript\">
						window.setTimeout(\"window.location.href='".$this->_url."'\",4*1000);
						</script>
				</head>
					<body>
					<table width='100%' align=center><tr><td align=center>
					  ".$this->_message."<br>
					 <input type=\"button\" value=\"<<back\" name=\"back\" onClick=\"window.location.href='".$this->_url."'\">
					 </td></tr></table>
					 </body>";
	}

	private function addalbum($tag)
	{
		$result=mysql_query("insert into album (uid,tap) values (".$this->_uid.",'".$tag."')",$this->_link);
		if(!$result)
			return false;
		else
			return true;
	}
 };
?>