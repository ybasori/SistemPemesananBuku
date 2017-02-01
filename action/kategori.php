<?php
if(isset($_POST["btn_add_kategori"])){
	// create kategori
	if(!empty($_POST["nama_kategori"])){
		$kategori->createKategori($_POST["nama_kategori"]);
	}
	$sys->redirect($sys->base_url()."/Kategori");
}
else if(isset($_POST["btn_edit_produk"])){
	// edit kategori
	if(!empty($_POST["id_kategori"])){
		$kategori->updateKategori($_POST["id_kategori"],$_POST["nama_kategori"]);
	}
	$sys->redirect($sys->base_url()."/Kategori");
}
else{
	// delete kategori
}

?>