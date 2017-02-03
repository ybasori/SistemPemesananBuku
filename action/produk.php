<?php
switch ($_POST["formaction"]) {
	case 'insert':
		include 'action/produk_insert.php';
	break;
	case 'update':
		include 'action/produk_update.php';
	break;
	case "delete":
	if(!empty($_POST["id"])){
		$product->deleteProduct($_POST["id"]);
		unlink($_POST["path_produk"]);
		$sys->redirect($sys->base_url()."/Produk");
	}
	else{
		$sys->redirect($sys->base_url()."/Produk");
	}
	break;
}
?>