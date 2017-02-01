<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_GET['menu']; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/styles.css">
	<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../plugins/sweetalert/sweetalert.css">
	<script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../plugins/datatables/jquery.dataTables.min.js"></script> <!-- lib js untuk datatables -->
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="../plugins/sweetalert/sweetalert.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
      			</button>
      			<a class="navbar-brand" href="#">Sistem Pemesanan Buku</a>
    		</div>
	    	<div class="collapse navbar-collapse" id="myNavbar">
	      		
	      		<ul class="nav navbar-nav navbar-right">
			        <li class="dropdown" style="background-color: #30a5ff">
        				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff"><i class="glyphicon glyphicon-user"></i> Nama User
        				<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="#" data-target="#modal-profile" data-toggle="modal">Profile </a></li>
				          <li><a href="#">Logout </a></li>
				        </ul>
      				</li>
	      		</ul>
	    	</div>
  		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li id='dashboard'><a href="http://localhost/SistemPemesananBuku/view/media.php?menu=Dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
			<li id="member"><a href="http://localhost/SistemPemesananBuku/view/media.php?menu=Member"><i class="glyphicon glyphicon-th-list"></i> Member</a></li>
			<li id="kategori"><a href="http://localhost/SistemPemesananBuku/view/media.php?menu=Kategori"><i class="glyphicon glyphicon-menu-hamburger"></i> Kategori</a></li>
			<li id="produk"><a href="http://localhost/SistemPemesananBuku/view/media.php?menu=Produk"><i class="glyphicon glyphicon-shopping-cart"></i> Produk</a></li>
			
		</ul>

	</div><!--/.sidebar-->

	<!--Content-->
	<?php

	$param = $_GET['menu'];

	if ($param == 'Dashboard')
	{
		include ('dashboard.php');
	}
	elseif ($param == 'Kategori') 
	{
		include ('kategori.php');
	}
	elseif ($param == 'Member') 
	{
		include ('member.php');
	}
	else 
	{
		include ('produk.php');
	}
	?>
	<!-- Modal Edit Profile-->
	<div id="modal-profile" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Edit Profil</h4>
      			</div>
      			<form action="../action/produk.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama_lengkap">Nama Lengkap</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="nama_produk">
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="jk">Jenis Kelamin</label>
        					<label class="radio-inline"><input type="radio" name="jk" value="laki-laki">Laki-laki</label>
        					<label class="radio-inline"><input type="radio" name="jk" value="perempuan">Perempuan</label>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="tlp">No. Telpon</label>
        					<div class="col-sm-7">
        						<input type="text" name="tlp" id="tlp" class="form-control">
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="alamat">Alamat</label>
        					<div class="col-sm-7">
        						<input type="text" name="alamat" id="alamat" class="form-control">
        					</div>
        				</div>
        			
      				</div>
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="btn_edit_profile">Simpan</button>
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      			</div>
      			</form>
    		</div>

  		</div>
	</div>
	<!--END MODAL-->
	<script type="text/javascript">
		$(document).ready(function(){
			var param = "<?php echo $_GET['menu']; ?>";
			if (param == 'Dashboard') {
				$('#dashboard').addClass('active');
			} else if (param == 'Member'){
				$('#member').addClass('active');
			} else if (param == 'Kategori') {
				$('#kategori').addClass('active');
			} else {
				$('#produk').addClass('active');
			}
		});
	</script>
</body>
</html>