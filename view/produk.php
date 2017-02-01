
<main class="col-xs-12 col-sm-9 col-lg-10 pull-right" style="top:55px;">
	<div class="col-sm-12 panel panel-default" style="padding-top: 15px">
		
		<div class="panel-header">				
					<!-- box-header -->
			<button class="btn btn-primary " data-toggle="modal" data-target="#modal-produk-add"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
		</div>
					<!-- /box-header -->					
					<!-- view data -->
        <div class="panel-body">
			<table id="tabel_data_produk" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>Nama Produk</th>
						<th>Keterangan</th>
						<th>Nama Kategori</th>
						<th>Action</th>
					</tr>
				</thead>						
				
			</table>                   
        </div><!-- /.box-body -->
					<!-- /view data -->
		
				<!-- /box box-primary-->
		
	</div> <!-- /.row -->
</main>

<!--Modal Add Product-->
<div id="modal-produk-add" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Tambah Produk</h4>
      			</div>
      			<!-- form edit -->
        		<form action="../action/produk.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama_produk">Nama Produk</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="eg. Kancil Nyolong Kolor">
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="kategori">Kategori</label>
        					<div class="col-sm-7">
        						<select name="kategori" id="kategori" class="form-control">
        							<option>Pendidikan</option>
        							<option>Hiburan</option>
        						</select>
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="keterangan">Keterangan</label>
        					<div class="col-sm-7">
        						<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="eg. Buku Dikarang Oleh Saya Sendiri">
        					</div>
        				</div>
						<div class="form-group">
							<label for="path_produk" class="control-label col-sm-3" >File</label>
							<div class="col-sm-7">
								<input type="file" name="path_produk" id="path_produk">
								<p class="help-block" id="helper-block-path">Ukuran File Max 3MB</p>
							</div>
						</div>
	      			</div>
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="btn_add_produk">Simpan</button>
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	      			</div>
      			</form>
        			<!--END FORM EDIT-->
    		</div>

  		</div>
	</div>
<!--END MODAL ADD PRODUCT-->

<!-- Modal Edit Produk-->
	<div id="modal-produk-edit" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Update Produk</h4>
      			</div>
      			<!-- form edit -->
        		<form action="../action/produk.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama_produk">Nama Produk</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama_produk" id="nama_produk" class="form-control" value="nama_produk">
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="kategori">Kategori</label>
        					<div class="col-sm-7">
        						<select name="kategori" id="kategori" class="form-control">
        							<option>Pendidikan</option>
        							<option>Hiburan</option>
        						</select>
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="keterangan">Keterangan</label>
        					<div class="col-sm-7">
        						<input type="text" name="keterangan" id="keterangan" class="form-control" value="keterangan">
        					</div>
        				</div>
						<div class="form-group">
							<label for="path_produk" class="control-label col-sm-3" >File</label>
							<div class="col-sm-7">
								<input type="file" name="path_produk" id="path_produk">
								<p class="help-block" id="helper-block-path">Ukuran File Max 3MB</p>
							</div>
						</div>
	      			</div>
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="btn_edit_produk">Simpan</button>
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	      			</div>
      			</form>
        			<!--END FORM EDIT-->
    		</div>

  		</div>
	</div>
	<!--END MODAL-->
		<script type="text/javascript">
		var t = $('#tabel_data_produk').DataTable({
			  "autoWidth": false,
			  "rowCallback": function( row, data, index ) {
				  $('td:eq(0)', row).html((data[0]+1));
				  $('td:eq(1)', row).html("<img style=\"width:100px\" src=\"../"+data[1]+"\">");
				  $('td:eq(5)', row).html("<button class=\"btn btn-warning update-form\" data-toggle=\"modal\" data-target=\"#modal-produk-edit\" data-id=\""+data[1]+"\"><i class=\"glyphicon glyphicon-pencil\"></i> Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger delete-form\" data-id=\""+data[1]+"\" ><i class=\"glyphicon glyphicon-trash\"></i> Hapus</button>");
			  },			  
			  "columnDefs": [
    				{ "width": "2%",sClass: "dt-head-center dt-body-center",  "targets": 0 },
    				{ "width": "10%",sClass: "dt-head-center dt-body-center",  "targets": 1 },
    				{ "width": "15%",sClass: "dt-head-center dt-body-left", "targets": 2 },
    				{ "width": "20%",sClass: "dt-head-center dt-body-left",  "targets": 3 },
    				{ "width": "15%",sClass: "dt-head-center dt-body-left", "targets": 4 },
    				{ "width": "20%",sClass: "dt-head-center dt-body-center", "targets": 5 }
  				]
		});	

		function add_data_to_table_t(table, data){
	  	  	table.clear().draw();
	  	  	table.rows.add(data).draw( false );
		}		

		function getDataOnJSON(data, id) {
			for(var i = 0; i < data.length; i++)
			{
				if(data[i][0] == id){
					return data[i];
				}
			}
		}

	  	$(document).ready(function(){
	  		//menampilkan kategori ke modal edit
	  		/** var kategori = "<?php echo $_GET['kategori']; ?>"; */
			$('#kategori').val(kategori);

			//data table
	  		<?php
	  			for($i=0;$i<5;$i++){
	  				$data [$i][0] = $i;
	  				$data [$i][1] = "gambar_produk/default_gambar_buku.png";
	  				$data [$i][2] = "Nama Produk";
	  				$data [$i][3] = "Keterangan";
	  				$data [$i][4] = "Nama Kategori";
	  				$data [$i][5] = $i;
	  			}
				echo "
				var data = ".json_encode($data).";
				console.log(JSON.stringify(data));
				add_data_to_table_t(t,data);
				";
	  		?> 
		  	t.order( [ 0, 'asc' ] ).draw(false);	  		


		  	//sweetalert
		  	$(".delete-form").click(function(){

		  		var element = $(this);
		  		var id = element.attr('data-id');
			  	swal({
					title: "Apakah Anda Yakin?",
					text: "Jika Anda Menghapus Ini, Maka Tidak Dapat Dikembalikan!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Ya! Hapus",
					cancelButtonText: "Batal",
					closeOnConfirm: false,
					closeOnCancel: false,
					showLoaderOnConfirm: true
				},
				function(isConfirm){
	  				if (isConfirm) {
	  					 $.ajax({
			                url: "../action/produk.php",
			                type: "POST",
			                data: "id="+id+"&path="+id,
			                dataType: "html",
			                success: function(data){
			                        if (data==1){
			                            setTimeout(function(){
			                                swal({
			                                    title: "Sukses",
			                                    text: "Foto Telah Dihapus!",
			                                    type: "success"
			                                }, function(){
			                                    window.location.reload(true);
			                                });
			                            }, 2000);
			                        }
			                },
			                error: function (xhr, ajaxOptions, thrownError) {
			                    setTimeout(function(){
			                        swal("Error!", "Silahkan Perikas Koneksi dan Ulangi", "error");
			                            }, 2000);}
			                 
			            });
	  				} else {
		    			swal("Batal", "Anda Tidak Jadi Menghapus Datanya :)", "error");
	  				}
				});

		  	});
		});	
</script>	