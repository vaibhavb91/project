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
					<?php
					$i = 1;
					$type = array('', "Admin", "Staff");
					$qry = $conn->query("SELECT * FROM clients"); // Corrected SQL syntax
					while ($row = $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++; ?></th>
						<td><b><?php echo ucwords($row['name']); ?></b></td>
						<td><?php echo $row['birth_date']; ?></td>
						<td><?php echo $row['mobile_no']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td class="text-center">
		                      <a class="dropdown-item view_client" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">View</a>
		                      <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php echo $row['id']; ?>">Edit</a>
		                      <a class="dropdown-item delete_client" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>	
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_client').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Client Details","view_client.php?id="+$(this).attr('data-id'))
	})
	$('.delete_client').click(function(){
	_conf("Are you sure to delete this user?","delete_client",[$(this).attr('data-id')])
	})
	})
	function delete_client($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_client',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>