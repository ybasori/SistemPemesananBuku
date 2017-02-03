<?php
	session_start();
// including classes - start
	function __autoload($namaClass){
		require "class/".$namaClass.".php";
	}

	$sys= new Rules("SistemPemesananBuku");
	// System
	// how to use:
	// $sys = new Rules("Directory")
	// $sys->get(key) = $_GET[key]
	// $sys->base_url() = http://127.0.0.1
	// $sys->site_url(data) = http://127.0.0.1/data
	// $sys->redirect(URL) http://URL
	$helper= new Helper;
	 
	$db = new Database;
	// Database Connection and user session
	// how to use:
	// $db = new Database
	// $db->query("SQL Query")
	// set session user:
	// $db->set_userdata($data):
	// $data= array("id" => id, "email"=> email, "level" => level )
	// get session user:
	// $db->userdata("id") / $db->userdata("email") / $db->userdata("level")
	// session destroy: $db->destroy_userdata()

	// $mbr = new Member;
	// Member login, Create, Update, Delete
	// $mbr->login(email, password)

	$member=new Member;
	$profile=new Profile;

	$product = new Product;	
	$kategori = new Kategori;

	

// including classes - end

	
// Directing to file - start
	if($sys->uri(0)=="action"){
		// including file in directory action - start
		$filename = $sys->uri(0)."/".$sys->uri(1).".php";
		if (file_exists($filename)) {
		    include $filename;
		} else {
		    echo "The file $filename does not exist";
		}
		// including file in directory action - end
	}
	else if(($sys->uri(0)=="Login") or ($sys->uri(0)=="login")){
		// including file view/login
		include "view/login.php";
	}
	else if($sys->uri(0)==""){
		$sys->redirect($sys->base_url()."/Login");
	}
	else{
		// including file view/media
		include "view/media.php";
		// including file media - end
	}
// Directing to file - end