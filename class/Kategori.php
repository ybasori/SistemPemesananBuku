<?php

/**
* 
*/
class Kategori extends Database
{
	private $tableName = "tb_kategori";
	
	public function createKategori($nama_kategori){
		$stmt = $this->query("INSERT INTO ".$this->tableName." (nama_kategori) VALUES('".$nama_kategori."')");
		return $stmt;
	}

	public function readKategori(){
		$stmt = $this->query("SELECT * FROM ".$this->tableName);
		return $stmt;
	}

	public function updateKategori($id,$nama_kategori){
		$stmt = $this->query("UPDATE ".$this->tableName." SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id'");
		$stmt->execute();
		return $stmt;
	}

	public function deleteKategori($id){
		$stmt = $this->query("DELETE FROM ".$this->tableName." WHERE id_kategori = '$id'");
		$stmt->execute();
		return $stmt;
	}

}

?>