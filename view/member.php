<main class="col-xs-12 col-sm-9 col-lg-10 pull-right" style="top:55px;">
	<div class="col-sm-12 panel panel-default" style="padding-top: 15px">
		<div class="panel-header">				
		<!-- panel header -->
			<button class="btn btn-primary " data-toggle="modal" data-target="#modal-produk-add"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
		</div>
		<!-- END Panel Header -->					
		<!-- view data -->
	    <div class="panel-body">
			<table id="tabel_data_member" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>Action</th>
					</tr>
				</thead>						
			</table>                   
        </div><!-- END-Panel-body -->
	</div><!--END PANEL-->
</main><!--END MAIN -->
<script type="text/javascript">
	var t = $('#tabel_data_member').DataTable({
		  "autoWidth": false,
		  "rowCallback": function( row, data, index ) {
			  $('td:eq(2)', row).html("<button class=\"btn btn-warning update-form\" data-toggle=\"modal\" data-target=\"#mymodalupdate\" data-id=\""+data[0]+"\"><i class=\"fa fa-edit\"></i>Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger delete-form\" data-toggle=\"modal\" data-target=\"#mymodaldelete\" data-id=\""+data[0]+"\" ><i class=\"fa fa-trash\"></i>Hapus</button>");
		  },			  
		  "columnDefs": [
				{ "width": "2%", "targets": 0 },
				{ "width": "15%", "targets": 1 },
				{ "width": "20%", "targets": 2 }
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
  			for($i=0;$i<5;$i++){
  				$data [$i][0] = "ini";
  				$data [$i][1] = "ini";
  				$data [$i][2] = "ini";
  			}
			echo "
			var data = ".json_encode($data).";
			console.log(JSON.stringify(data));
			add_data_to_table_t(t,data);
			";
  		?> 
	  	t.order( [ 0, 'asc' ] ).draw(false);	  		
	});	
</script>	