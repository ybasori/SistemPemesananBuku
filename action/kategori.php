<?php
switch($_POST["formaction"]){
	case "insert": // create kategori
	if(!empty($_POST["nama_kategori"])){
		$check=$kategori->count_by_name($_POST["nama_kategori"]);
		if($check==0){
			$kategori->createKategori($_POST["nama_kategori"]);
			$sys->redirect($sys->base_url()."/Kategori");
		}
		else{
			?>
			<div class="alert alert-danger">
			Kategori sudah ada
			</div>
			<?php
		}
	else{
		$sys->redirect($sys->base_url()."/Kategori");
	}
		
	}
	break;
	case "update": // update kategori
	if(!empty($_POST["id_kategori"])){
		$check=$kategori->count_by_name($_POST["nama_kategori"]);
		if($check==0){
			$kategori->updateKategori($_POST["id_kategori"],$_POST["nama_kategori"]);
			$sys->redirect($sys->base_url()."/Kategori");
		}
		else{
			?>
			<div class="alert alert-danger">
			Kategori sudah ada
			</div>
			<?php
		}
	}
	else{
		$sys->redirect($sys->base_url()."/Kategori");
	}
	//$sys->redirect($sys->base_url()."/Kategori");
	break;
	case 'delete':
	$stmt=$kategori->deleteKategori($_POST["id"]);
	$sys->redirect($sys->base_url()."/Kategori");
	break;
	
}
?>