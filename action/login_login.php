<?php

$check= $member->check($_POST["email"], $_POST["password"]);
if($check==0){
	?><div class="alert alert-danger alert-satu">Akun tidak terdaftar, silahkan daftar terlebih dahulu.</div><?php
}
else{
	?><div class="alert alert-success alert-satu">Selamat datang.</div><?php
	$member->login($_POST["email"], $_POST["password"]);
	echo $sys->redirect($sys->base_url()."/Dashboard");
}

?>