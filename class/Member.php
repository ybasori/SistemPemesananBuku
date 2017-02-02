<?php
/**
* 
*/
class Member extends Database
{
	public function login($email, $password){
		$pw=sha1($password);
		$member=$this->query("SELECT * FROM tb_member WHERE email='$email' and password='$pw'");
			$row=$member->fetch();
			if(count($row["id_member"])!=0){
				$data=array(
					"id" => $row["id_member"],
					"email" => $row["email"],
					"level" => $row["level"]
					);
				$this->set_userdata($data);
				return $data;
			}
	}
	public function readMember(){
		$member=$this->query("SELECT tb_member.*, tb_profil.* FROM tb_member, tb_profil WHERE tb_member.id_member=tb_profil.id_member");
		return $member;
	}
}
?>