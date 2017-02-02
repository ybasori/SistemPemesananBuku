<main class="col-xs-12 col-sm-9 col-lg-10 pull-right" style="top:55px;">
	<div class="col-sm-12 panel panel-default" style="padding-top: 15px">
	    <div class="panel-body">
			<table id="tabel_data_member" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>						
			</table>                   
        </div><!-- END-Panel-body -->
	</div><!--END PANEL-->
</main><!--END MAIN -->

<!-- Modal Edit Produk-->
	<div id="modal-member-edit" class="modal fade" role="dialog">
  		<div class="modal-dialog">    
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Update Member</h4>
      			</div>
      			<!-- form edit -->
        		<form action="<?php echo $sys->base_url() ?>/action/produk.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" class="form-horizontal">
      				<div class="modal-body">
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="nama">Nama</label>
        					<div class="col-sm-7">
        						<input type="text" name="nama" id="edit_nama" class="form-control" disabled>
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="email">Email</label>
        					<div class="col-sm-7">
        						<input type="text" name="email" id="edit_email" class="form-control" disabled>
        					</div>
        				</div>
        				<div class="form-group">
        					<label class="control-label col-sm-3" for="level">Level</label>
        					<div class="col-sm-7">
        						<select name="level" id="edit_level" class="form-control">
        							<option value="member">member</option>
        							<option value="master">master</option>
        						</select> 
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
	var t = $('#tabel_data_member').DataTable({
		  "autoWidth": false,
		  "rowCallback": function( row, data, index ) {
		  	$('td:eq(1)', row).html("<img style=\"width:100px\" src=\"<?php echo $sys->base_url(); ?>/"+data[1]+"\">");
			 $('td:eq(5)', row).html("<button class=\"btn btn-warning update-form\" data-toggle=\"modal\" data-target=\"#modal-member-edit\" data-id=\""+data[0]+"\"><i class=\"glyphicon glyphicon-pencil\"></i> Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger delete-form\" data-id=\""+data[0]+"\" ><i class=\"glyphicon glyphicon-trash\"></i> Hapus</button>");
		  },			  
		  "columnDefs": [
				{ "width": "2%",sClass: "dt-head-center dt-body-center", "targets": 0 },
				{ "width": "10%",sClass: "dt-head-center dt-body-center", "targets": 1 },
				{ "width": "20%",sClass: "dt-head-center dt-body-left", "targets": 2 },
				{ "width": "10%",sClass: "dt-head-center dt-body-center", "targets": 3 },
				{ "width": "10%",sClass: "dt-head-center dt-body-center", "targets": 4 },
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
  		<?php
  			$stmt=$member->readMember();
  			$i=0;
  			while($row=$stmt->fetch()){
  				$data [$i][0] = $i;
  				$data [$i][1] = $row["path_foto"];
  				$data [$i][2] = $row["nama_lengkap"];
  				$data [$i][3] = $row["email"];
  				$data [$i][4] = $row["level"];
  				$data [$i][5] = $row["id_member"];
  				$i++;
  			}
			echo "
			var data = ".json_encode($data).";
			console.log(JSON.stringify(data));
			add_data_to_table_t(t,data);
			";
  		?> 
	  	t.order( [ 0, 'asc' ] ).draw(false);	
	  	$(".update-form").click(function(){
	  		var indeks = $(this).data('id');
	  		$("#edit_nama").val(data[indeks][2]); 
	  		$("#edit_email").val(data[indeks][3]); 
	  		$("#edit_level").val(data[indeks][4]); 
	  	});

	  	//sweetalert
	  	$(".delete-form").click(function(){
	  		var indeks = $(this).data('id');
	  		console.log("id="+data[indeks][5]);
		  	swal({
				title: "Apakah Anda Yakin?",
				text: "Jika Anda Menghapus Data Member Ini, Maka Data Tersebut Tidak Dapat Dikembalikan!",
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
  					/*
  					 $.ajax({
		                url: "/action/member.php",
		                type: "POST",
		                data: "id="+data[indeks][5],
		                dataType: "html",
		                success: function(data){
		                        if (data==1){
		                            setTimeout(function(){
		                                swal({
		                                    title: "Sukses",
		                                    text: "Data Telah Dihapus!",
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
		                 
		            });*/
			        $.ajax({
						dataType: "html", 
		                url: "<?php echo $sys->base_url() ?>/action/member.php",
						type:"POST",
					    contentType: false,
					    processData: false,     
						data: function() {
					        var cek = new FormData();
		                	cek.append("id",data[indeks][5]);
		                	cek.append("formaction","delete");
					        return cek;
					    }(),
					    success:function(data){
							if (true){
	                            setTimeout(function(){
	                                swal({
	                                    title: "Sukses",
	                                    text: "Data Member Telah Dihapus!",
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
		                        }, 2000);
		                }
					});	
  				} else {
	    			swal("Batal", "Anda Tidak Jadi Menghapus Data Member :)", "error");
  				}
			});
	  	});	  	  		
	});	
</script>
<pre>
	<?php print_r($data); ?>
</pre>