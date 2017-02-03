

	<!--Content-->
	<main class="col-xs-12 col-sm-9 col-lg-10 pull-right" style="top:55px">
		<div class="col-sm-12 panel">
			<div class="panel-body">
				<!--Jumlah Produk DLL-->
				<?php if($db->userdata("level")=="master"){?>
				<div id="number">
					<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h2 style="text-align:center; font-family: cursive; font-size: 40px;"><i class="glyphicon glyphicon-shopping-cart"></i></h2>
								<h4 class="center-block" style="text-align: center;"><b>PRODUK</b></h4>
							</div>
							<div class="panel-body">
								<h1 style="text-align: center;"><strong><?php echo $product->count(); ?></strong></h1>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<h2 style="text-align:center; font-family: cursive; font-size: 40px;"><i class="glyphicon glyphicon-menu-hamburger"></i></h2>
								<h4 class="center-block" style="text-align: center;"><b>KATEGORI</b></h4>
							</div>
							<div class="panel-body">
								<h1 style="text-align: center;"><strong><?php echo $kategori->count(); ?></strong></h1>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h2 style="text-align:center; font-family: cursive; font-size: 40px;"><i class="glyphicon glyphicon-th-list"></i></h2>
								<h4 class="center-block" style="text-align: center;"><b>MEMBER</b></h4>
							</div>
							<div class="panel-body">
								<h1 style="text-align: center;"><strong><?php echo $member->count(); ?></strong></h1>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!--END Jumlah-->
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-body" style="background-image: url(<?php echo $sys->base_url() ?>/background/bg1.jpg); width: 100%">
							<img src="<?php echo $sys->base_url()."/".$profile->get_by_mbrid($db->userdata("id"), "path_foto") ?>" alt="member" class="img-responsive img-thumbnail img-circle center-block" style="width: 210px; margin-bottom: -35px">
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="panel-body">
						<div class="col-sm-2 col-sm-offset-5">
							<button class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-upload">Ganti Foto</button>
						</div>
						<div class="col-sm-12">
							<h3 style="text-align: center;">SELAMAT DATANG</h3>
							<h4 style="text-align: center;"><strong><?php  echo $profile->get_by_mbrid($db->userdata("id"), "nama_lengkap")?$profile->get_by_mbrid($db->userdata("id"), "nama_lengkap"):$db->userdata("email"); ?></strong></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<!--MODAL FOTO-->
	<div class="modal fade" id="modal-upload" tabindex="-1">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Ganti Foto</h4>
      			</div>
	                    
	            <div class="modal-body" >
	                
	                    <img id="foto" src="<?php echo $sys->base_url() ?>/foto_member/default_foto_member.png" class="img-responsive img-thumbnail center-block" style='width: 13em'>
	                    <div class="caption">
	                        <br/><br/>
	                        <div class="bg-danger">Hanya File .jpg dan berukuran di bawah 10MB yang di perbolehkan</div>
	                        <br/>
	                        <form action="<?php echo $sys->base_url() ?>/action/member.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
	                            <a href="#" id="pilih"><span class="glyphicon glyphicon-camera" data-toggle="tooltip" data-placement="right" title="ganti foto"></span>
	                            Pilih Foto
	                            </a>
	                            <br/><br/>
	                            <input type="file"  id="browse" name="file_user" value="pilih" style="display: none" onchange="tampil(this)">
	                            <input type="submit" class="btn btn-primary" name="upload" value="Ganti">
	                        </form>
	                    </div>
	              
	            </div>
	        </div>
	    </div>
	</div>
	<!--END-->

	<script type="text/javascript">
    $(document).ready(function(){
        $('#pilih').click(function(){
            $("#browse").click();
        });
    });

    function tampil(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                   
                $('#foto').attr('src', e.target.result);
                    
                };

                reader.readAsDataURL(input.files[0]);
        }
    }
	</script>