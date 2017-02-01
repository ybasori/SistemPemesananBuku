<?php

/**
* 
*/
class Product extends Database
{
	private $tableName = "tb_produk";
	
	public function createProduct($id_kategori,$nama_produk,$path_produk,$keterangan){
		$stmt = $this->query("INSERT INTO ".$this->tableName." (id_kategori, nama_produk, path_foto, keterangan) VALUES('".$id_kategori."','".$nama_produk."','".$path_produk."','".$keterangan."')");
		return $stmt;
	}

	public function readProduct(){
		$stmt = $this->query("SELECT tb_produk.*, tb_kategori.nama_kategori FROM ".$this->tableName.", tb_kategori WHERE tb_produk.id_kategori= tb_kategori.id_kategori");
		return $stmt;
	}

	public function updateProduct($id,$id_kategori,$nama_produk,$path_produk,$keterangan){
		$stmt = $this->query("UPDATE ".$this->tableName." SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', path_foto = '$path_produk', keterangan = '$keterangan' WHERE id_produk = '$id'");
		return $stmt;
	}

	public function deleteProduct($id){
		$stmt = $this->query("DELETE FROM ".$this->tableName." WHERE id_produk = '$id'");
		return $stmt;
	}

}

?>