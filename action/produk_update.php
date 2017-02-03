<?php
if($_FILES["path_produk"]["name"]){
			$gambar=$sys->img_rules($_FILES["path_produk"]);
			if($gambar["empty"]===0){
				$emptyData=0;
				// check if there is an empty field
				foreach($_POST as $name => $products){
					switch ($name) {
						case 'nama_produk':
							$title="Nama Produk";
						break;
						case "kategori":
							$title="Kategori";
						break;
						case "keterangan":
							$title="Keterangan";
						break;
						default:
							$title="Ada sesuatu yang";
						break;
					}
					// alert if there is an empty field
					if(empty($products)){
						?>
						<div class="alert alert-danger" ><?php echo $title ?> kosong.</div>
						<?php
						$emptyData++;
					}
				}
				// if all fields are not empty
				if($emptyData==0){
					if($_FILES["path_produk"]["size"]>3000000){
						?>
					 	<div class="alert alert-danger" >Ukuran file gambar terlalu besar.</div>
					 	<?php
					}
					else{
						if(move_uploaded_file($_FILES["path_produk"]["tmp_name"], $gambar["target"])) {
						 	$product->updateProduct($_POST["id_produk"], $_POST["kategori"], $_POST["nama_produk"], $gambar["target"], $_POST["keterangan"]);
						 	unlink($_POST["path_produk"]);
						 	$sys->redirect($sys->base_url()."/Produk");
					    }
					    else {
					     	// alert if file did not upload
					        ?>
						 	<div class="alert alert-danger" >File gambar tidak dapat diunggah.</div>
						 	<?php
					    }
					}
				}
		    } else {
		    	// alert if field not an image
		        ?>
				<div class="alert alert-danger" >File ini bukan gambar.</div>
				<?php
		    }
		}
		else{
			$emptyData=0;
				// check if there is an empty field
				foreach($_POST as $name => $products){
					switch ($name) {
						case 'nama_produk':
							$title="Nama Produk";
						break;
						case "kategori":
							$title="Kategori";
						break;
						case "keterangan":
							$title="Keterangan";
						break;
						default:
							$title="Ada sesuatu yang";
						break;
					}
					// alert if there is an empty field
					if(empty($products)){
						?>
						<div class="alert alert-danger" ><?php echo $title ?> kosong.</div>
						<?php
						$emptyData++;
					}
				}
				// if all fields are not empty
				if($emptyData==0){
					$product->updateProduct_noimg($_POST["id_produk"], $_POST["kategori"], $_POST["nama_produk"], $_POST["keterangan"]);
					$sys->redirect($sys->base_url()."/Produk");
				}
		}
?>