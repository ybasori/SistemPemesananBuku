<?php
if(empty($db->userdata("id"))){
	$sys->redirect($sys->base_url()."/Login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $sys->uri(0); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $sys->base_url(); ?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $sys->base_url() ?>/bootstrap/css/styles.css">
	<link rel="stylesheet" href="<?php echo $sys->base_url() ?>/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo $sys->base_url() ?>/plugins/datatables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo $sys->base_url() ?>/plugins/sweetalert/sweetalert.css">
	<script type="text/javascript" src="<?php echo $sys->base_url() ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $sys->base_url() ?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $sys->base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script> <!-- lib js untuk datatables -->
	<script src="<?php echo $sys->base_url() ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo $sys->base_url() ?>/plugins/sweetalert/sweetalert.min.js"></script>
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
        				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff"><i class="glyphicon glyphicon-user"></i> <?php  echo $profile->get_by_mbrid($db->userdata("id"),"nama_lengkap")?$profile->get_by_mbrid($db->userdata("id"),"nama_lengkap"):$db->userdata("email"); ?>
        				<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="#" data-target="#modal-profile" data-toggle="modal">Edit Profile </a></li>
				          <li><a href="<?php echo $sys->base_url()."/action/logout"; ?>">Logout </a></li>
				        </ul>
      				</li>
	      		</ul>
	    	</div>
  		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li id='dashboard'><a href="<?php echo $sys->base_url(); ?>/Dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
			<?php if($db->userdata("level")=="master"){?>
			<li id="member"><a href="<?php echo $sys->base_url(); ?>/Member"><i class="glyphicon glyphicon-th-list"></i> Member</a></li>
			<?php } ?>
			<li id="kategori"><a href="<?php echo $sys->base_url(); ?>/Kategori"><i class="glyphicon glyphicon-menu-hamburger"></i> Kategori</a></li>
			<li id="produk"><a href="<?php echo $sys->base_url(); ?>/Produk"><i class="glyphicon glyphicon-shopping-cart"></i> Produk</a></li>
			
		</ul>

	</div><!--/.sidebar-->

	<!--Content-->
	<?php

	$filename = 'view/'.$sys->uri(0).".php";
		if (file_exists($filename)) {
		    include $filename;
		} else {
		    echo "The file $filename does not exist";
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
      			<form action="<?php echo $sys->base_url() ?>/action/produk.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
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
			var param = "<?php echo $sys->uri(0); ?>";
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