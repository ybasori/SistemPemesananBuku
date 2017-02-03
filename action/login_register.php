<?php
foreach ($_POST as $key => $value) {
	switch ($key) {
		case 'add_email':
			$title="E-mail";
			break;
		case 'add_password':
			$title="Password";
			break;
		case 'add_password_confirm':
			$title="Konfirmasi Password";
			break;
		default:
			$title="Ada sesuatu yang";
			break;
	}
	if(($value)==""){
		?><div class="alert alert-danger alert-satu"><?php echo $title ?> kosong</div><?php
	}

}
$cek=$member->check_email($_POST["add_email"]);
if($cek>=1){
	?><div class="alert alert-danger alert-satu">E-mail sudah terdaftar. Silahkan melakukan Login.</div><?php
	$emailUnique=0;
}
else{
	if(strpos($_POST["add_email"],"@")==true){
		$emailUnique=1;
	}
	else{
		?><div class="alert alert-danger alert-satu">Input yang anda masukan tidak terdeteksi sebagai e-mail.</div><?php
		$emailUnique=0;
	}
	
}
if($_POST["add_password"]==$_POST["add_password_confirm"]){
	$passSama=1;
}
else{
	?><div class="alert alert-danger alert-satu">Konfirmasi Password tidak sama dengan Password.</div><?php
	$passSama=0;
}
if(($emailUnique==1) && ($passSama==1)){
	$member->createMember($_POST["add_email"], $_POST["add_password"]);
	?>
	<div class="alert alert-success alert-satu">Selamat anda sudah terdaftar. Silahkan melakukan login.</div><?php
}
?>