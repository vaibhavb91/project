<?php include 'db_connect.php'; ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_clients"><i class="fa fa-plus"></i> Add New Client</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Birth Date</th>
						<th>Mobile No</th>
						<th>Address</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#list').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "fetch_clients.php",
				"type": "POST"
			},
			"columns": [
				{ "data": "id" },
				{ "data": "name" },
				{ "data": "birth_date" },
				{ "data": "mobile_no" },
				{ "data": "address" },
				{ "data": "email" },
				{
					"data": "action",
					"orderable": false,
					"searchable": false
				}
			]
		});

		// Client Details and Delete Actions
		$('#list').on('click', '.view_client', function(){
			uni_modal("<i class='fa fa-id-card w-100'></i> Client Details","view_client.php?id="+$(this).attr('data-id'))
		})
		$('#list').on('click', '.delete_client', function(){
			_conf("Are you sure to delete this client?","delete_client",[$(this).attr('data-id')])
		})
	})

	function delete_client(id){
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_client',
			method: 'POST',
			data: { id: id },
			success: function(resp){
				if(resp == 1){
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function(){
						$('#list').DataTable().ajax.reload()
					}, 1500)
				}
			}
		})
	}
</script>
