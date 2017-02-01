<?php

/**
* 
*/
class Produk extends Database
{
	private $conn;
	private $tableName = "tb_produk";
	public $id_produk;
	public $id_kategori;
	public $nama_produk;
	public $path_produk;
	public $keterangan;
	
	public function createProduct($id_kategori,$nama_produk,$path_produk,$keterangan){
		$stmt = $this->query("INSERT INTO ".$this->tableName." (id_kategori, nama_produk, path_foto, keterangan) VALUES('".$id_kategori."','".$nama_produk."','".$path_produk."','".$keterangan."')");
		$stmt->execute();
		return $stmt;
	}

	public function readProduct(){
		$stmt = $this->query("SELECT * FROM ".$this->tableName);
		return $stmt;
	}

	public function updateProduct($id,$id_kategori,$nama_produk,$path_produk,$keterangan){
		$stmt = $this->query("UPDATE ".$this->tableName." SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', path_foto = '$path_produk', keterangan = '$keterangan' WHERE id_produk = '$id'");
		$stmt->execute();
		return $stmt;
	}

	public function deleteProduct($id){
		$stmt = $this->query("DELETE FROM ".$this->tableName." WHERE id_produk = '$id'");
		$stmt->execute();
		return $stmt;
	}

}

?>