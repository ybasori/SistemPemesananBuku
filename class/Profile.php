<?php
/**
* 
*/
class Profile extends Database
{
	
	public function get_by_mbrid($id, $data){
		$member=$this->query("SELECT * FROM tb_profil WHERE id_member='$id'");
		$row= $member->fetch();
		return $row[$data];
	}
}
?>