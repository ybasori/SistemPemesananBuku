<main class="col-xs-12 col-sm-9 col-lg-10 pull-right" style="top:55px;">
	<div class="col-sm-12 panel panel-default" style="padding-top: 15px">
		
		<div class="panel-header">				
					<!-- panel-header -->
			<button class="btn btn-primary " data-toggle="modal" data-target="#modal-kategori-add"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
		</div>
					<!-- /panel-header -->					
					<!-- view data -->
        <div class="panel-body">
			<table id="tabel_data_kategori" class="table table-bordered table-striped" style="width: 600px;">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>                   
        </div><!-- /panel-body -->
		<!-- /view data -->
	</div>
</main><!--/.col (right) -->


<!--Modal Add Kategorit-->
	<div id="modal-kategori-add" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Tambah Kategori</h4>
      			</div>
      			<!-- form ADD -->
        		<form action="<?php echo $sys->base_url() ?>/action/kategori" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama_kategori">Nama Kategori</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="eg. Hiburan">
        					</div>
        				</div>
        			</div>
        				
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="btn_add_kategori">Simpan</button>
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	      			</div>
      			</form>
        			<!--END FORM EDIT-->
    		</div>

  		</div>
	</div>
<!--END MODAL ADD PRODUCT-->

<!-- Modal Edit Produk-->
	<div id="modal-kategori-edit" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Edit Kategori</h4>
      			</div>
      			<!-- form edit -->
        		<form action="<?php echo $sys->base_url() ?>/action/kategori" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama_kategori">Nama Kategori</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama_kategori" id="edit_nama_kategori" class="form-control" value="nama_kategori">
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
	var t = $('#tabel_data_kategori').DataTable({
		  "rowCallback": function( row, data, index ) {
			  $('td:eq(0)', row).html((data[0]+1));
			  $('td:eq(2)', row).html("<button class=\"btn btn-warning update-form col-sm-4 col-sm-offset-1\" data-toggle=\"modal\" data-target=\"#modal-kategori-edit\" data-id=\""+data[0]+"\"><i class=\"glyphicon glyphicon-pencil\"></i> Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger delete-form col-sm-4 col-sm-offset-1\" data-id=\""+data[0]+"\" ><i class=\"glyphicon glyphicon-trash\"></i> Hapus</button>");
		  },			  
		  "columnDefs": [
				{ "width": "2%",sClass: "dt-head-center dt-body-center",  "targets": 0 },
				{ "width": "15%",sClass: "dt-head-center dt-body-left",  "targets": 1 },
				{ "width": "15%",sClass: "dt-head-center dt-body-center", "targets": 2 }
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
  		<?php
  			$stmt=$kategori->readKategori();
	  			$i=0;
				while($row=$stmt->fetch()){
					$data[$i][0]=$i;
					$data[$i][1]=$row["nama_kategori"];
					$data[$i][2]=$row["id_kategori"];
					$i++;
				}
			echo "
			var data = ".json_encode($data).";
			console.log(JSON.stringify(data));
			add_data_to_table_t(t,data);
			";
  		?> 
	  	t.order( [ 0, 'asc' ] ).draw(false);	

	  	//mengisi modal update
	  	$(".update-form").click(function(){
	  		var indeks = $(this).data('id');
	  		$("#edit_nama_kategori").val(data[indeks][1]); 
	  	});	  	
	  	//sweetalert
	  	$(".delete-form").click(function(){
	  		var indeks = $(this).data('id');
	  		var id = data[indeks][2];
	  		console.log(id);
		  	swal({
				title: "Apakah Anda Yakin?",
				text: "Jika Anda Menghapus Data Kategori Ini, Maka Data Tersebut Tidak Dapat Dikembalikan!",
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
		                url: "<?php echo $sys->base_url() ?>/action/kategori",
		                type: "POST",
		                data: "id="+id,
		                dataType: "html",
		                success: function(data){
		                        if (data==1){
		                            setTimeout(function(){
		                                swal({
		                                    title: "Sukses",
		                                    text: "Data Kategori Telah Dihapus!",
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
	    			swal("Batal", "Anda Tidak Jadi Menghapus Data Kategori :)", "error");
  				}
			});
	  	});  		
	});	
</script>	