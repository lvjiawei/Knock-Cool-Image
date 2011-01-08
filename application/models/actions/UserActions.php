<?php
class UserActions{
	protected static $albums=array();
	protected static $count=null;
	protected static $offset=null;
	function _construct()
	{
		Zend_Loader::loadClass("Album");
	}
	public function _getInstanceAlbums()
	{
		return self::$albums;
	}
	public function _getInstanceCount()
	{
		return self::$count;
	}
	private function setAlbums($rows)
	{
		$i=0;
		if(count($rows)>0):
		while($rows){
			$this->albums[$i]=array(
				'aid'         => $rows->aid,
				'aname'       => $rows->aname,
				'cover'       => $rows->cover,
				'discription' => $rows->discription,
				'right'       => $rows->action_right,
				'flowers'     => $rows->flowers,
				'tap'         => $rows->tap,
			);
			$i=$i+1;
		}
		if($i!=0)$this->count=$i;
		endif;
	}
	public function getCount()
	{
		return $this->count;
	}
	public function setUser($uid)
	{
		$album=new Album();
		$albums=$album->fetchAll("uid =".$uid);
		$this->setAlbums($albums);	
	}
	public function getAlbums()
	{
		return $this->albums;
	}
	public function getaAlbum($offset)
	{
		if(isset($this->albums[$offset]))
		$temp=$this->albums[$offset];
		else
		$temp=NULL;
		return $temp;
	}
	public function getThreeAlbums($offset)
	{
		for($i=1;$i<4;$i++){
			if(isset($this->albums[$offset*3+$i]))
				$temp[$i]=$this->albums[$offset*3+$i];
			else
				$temp[$i]=NULL;
		}
		return $temp;
	}
}
?>