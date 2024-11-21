<?php include 'db_connect.php' ?>
<?php
if (isset($_GET['id'])) {
	$qry = $conn->query("SELECT * FROM clients WHERE id = " . $_GET['id'])->fetch_array();
	foreach ($qry as $k => $v) {
		$$k = $v;
	}
}
?>
<div class="">
	<div class="card shadow">
		<div class="card-header bg-dark text-white">
			<h3 class="card-title"><?php echo ucwords($name); ?></h3>
			<p class="card-text"><?php echo $email; ?></p>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Name</h6>
					<p><?php echo $name; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Birth Date</h6>
					<p><?php echo $birth_date; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Age</h6>
					<p><?php echo $age; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Gender</h6>
					<p><?php echo $gender; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Mobile No</h6>
					<p><?php echo $mobile_no; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Alternative No</h6>
					<p><?php echo $alternative_no; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Address</h6>
					<p><?php echo $address; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">State</h6>
					<p><?php echo $state; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Pincode</h6>
					<p><?php echo $pincode; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Email</h6>
					<p><?php echo $email; ?></p>
				</div>
				<div class="col-md-3 mb-3">
					<h6 class="text-muted">Referred By</h6>
					<p><?php echo $referred_by; ?></p>
				</div>

			</div>
		</div>
		<div class="card-footer text-right">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<style>
	.card {
		border-radius: 10px;
	}
	.card-header, .card-footer {
		border-radius: 10px 10px 0 0;
	}
	.card-title {
		margin-bottom: 0;
	}
	.text-muted {
		font-weight: bold;
	}
</style>
