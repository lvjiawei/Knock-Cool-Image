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
class MySQL{
	private $con;
	private $query;
	private $add;
	private $update;
	private $select;
	private $drop;

	function __construct()
	{
		$this->con=mysql_connect("localhost","root","");
		if(!$this->con){
			die('Could not connect: ' . mysql_error());
			return false;
		}else
			return true;
	}
	function __destruct()
	{
		if(isset ($this->temp))
			unset($this->temp);
		if(isset ($this->query))
			unset($this->query);
		if(isset ($this->add))
			unset($this->add);
		if(isset ($this->update))
			unset($this->update);
		if(isset ($this->drop))
			unset($this->drop);
		if(isset ($this->select))

		mysql_close($this->con);
	}

	public function getConnect()
	{
		return $this->con;
	}
	public function setAdd($table,$vnames,$values)
	{
		$this->add=array(
			'table' => $table,
			'vnames' => $vnames,
			'values' => $values
		);
	}
	public function setUpdate($table,$set,$where)
	{
		$this->update=array(
			'table' => $table,
			'set' => $set,
			'where' => $where
		);
	}
	public function setSelect($column,$table,$where)
	{
		$this->select=array(
			'column' => $column,
			'table' => $table,
			'where' => $where
		);
	}
	public function setDrop($table,$where)
	{
		$this->drop=array(
			'table' => $table,
			'where' => $where
		);
	}
	public function setQuery($senquence)
	{
		$this->query=$senquence;
	}
	public function add(){
		$db=mysql_select_db("user_db",$this->con);
		if($db)
			return mysql_query("insert into ".$this->add['table']." (".$this->add['vnames'].") values(".$this->add['values'].")",$this->con);
		else
			return false;
	}
	public function update(){
		$db=mysql_select_db("user_db");
		if($db)
			return mysql_query("update ".$this->update['table']." set ".$this->update['set']." where ".$this->update['where']."",$this->con);
		else
			return false;
	}
	public function select(){
		$db=mysql_select_db("user_db");
		if($db){
			$result=mysql_query("select ".$this->select['column']." from ".$this->select['table']." where ".$this->select['where']."",$this->con);
			return mysql_fetch_array($result);
		}
		else
			return false;
	}
	public function drop(){
		$db=mysql_select_db("user_db");
		if($db)
			return mysql_query("delete from ".$this->drop['table']." where ".$this->drop['where']."",$this->con);
		else
			return false;
	}
	public function query(){
		$db=mysql_select_db("user_db",$this->con);
		if($db){
			$result=mysql_query($this->query,$this->con);
			return $result;
		}
		else
			die('Could not connect: ' . mysql_error());
		return false;
	}
}
function connect(){
	$link=mysql_connect("localhost","root","");
	if(!$link)die("Cannot connect:".mysql_error());
	else
		return $link;
}
?>