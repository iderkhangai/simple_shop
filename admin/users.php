<?php

?>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<h3>Хэрэглэгч удирдах</h3> 
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> Нэмэх</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Нэр</th>
								<th class="text-center">Нэвтрэх нэр</th>
								<th class="text-center">Үйлдэлүүд</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'db_connect.php';
							$users = $conn->query("SELECT * FROM users order by name asc");
							$i = 1;
							while ($row = $users->fetch_assoc()) :
							?>
								<tr>
									<td>
										<?php echo $i++ ?>
									</td>
									<td>
										<?php echo $row['name'] ?>
									</td>
									<td>
										<?php echo $row['username'] ?>
									</td>
									<td>
										<center>
											<div class="btn-group">
												<button type="button" class="btn btn-primary">Action</button>
												<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item edit_user" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'>Засах</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item delete_user" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'>Устгах</a>
												</div>
											</div>
										</center>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	$('#new_user').click(function() {
		uni_modal('Хэрэглэгч нэмэх', 'manage_user.php')
	})
	$('.edit_user').click(function() {
		uni_modal('Засах', 'manage_user.php?id=' + $(this).attr('data-id'))
	})
	// $('.delete_user').click(function() {
	// 	uni_modal('Устгах', 'delete_user.php?id=' + $(this).attr('data-id'))
	// })
	$('table').dataTable()
</script>