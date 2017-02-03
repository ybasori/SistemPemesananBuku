<?php
/**
* 
*/
class Member extends Database
{
	public function check($email, $password){
		$pw=sha1($password);
		$member=$this->query("SELECT * FROM tb_member WHERE email='$email' and password='$pw'");
		return $member->rowCount();
	}
	public function login($email, $password){
		$pw=sha1($password);
		$member=$this->query("SELECT * FROM tb_member WHERE email='$email' and password='$pw'");
			$row=$member->fetch();
				$data=array(
					"id" => $row["id_member"],
					"email" => $row["email"],
					"level" => $row["level"]
					);
				$this->set_userdata($data);
				return $data;
	}
	public function readMember(){
		$member=$this->query("SELECT tb_member.*, tb_profil.* FROM tb_member, tb_profil WHERE tb_member.id_member=tb_profil.id_member");
		return $member;
	}
	public function updateMemberLevel($id, $level){
		$member=$this->query("UPDATE tb_member SET level = '$level' WHERE id_member = '$id'");
		return $member;
	}
	public function count_master(){
		$member=$this->query("SELECT * FROM tb_member WHERE tb_member.level='master'");
		$zzz=$member->rowCount();
		return $zzz;
	}
	public function check_email($data){
		$member=$this->query("SELECT * FROM tb_member WHERE tb_member.email='$data'");
		$zzz=$member->rowCount();
		return $zzz;
	}
	public function createMember($email, $password){
		$pass=sha1($password);
		$stmt = $this->query("INSERT INTO tb_member (email, password, level) VALUES('$email', '$pass', 'member')");
		return $stmt;
	}
	public function count(){
		$member=$this->query("SELECT * FROM tb_member");
		$zzz=$member->rowCount();
		return $zzz;
	}
}
?>