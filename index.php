<?php
	function __autoload($namaClass){
		require "class/".$namaClass.".php";
	}
	$db = new Database;
	$product = new Produk;
	$data = $product->readProduct();
	while ($row = $data->fetch()) {
		echo $row['nama_produk'];
	}
	$product->createProduct('.$id_kategori.','.$nama_produk.','.$path_produk.','.$keterangan.');
	
?>