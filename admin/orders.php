<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<h2>Нийт Захиалга</h2>
				<table class="table table-bordered">
					<thead>
						<tr>

							<th>#</th>
							<th>Нэр</th>
							<th>Хаяг</th>
							<th>Email хаяг</th>
							<th>Утасны дугаар</th>
							<th>Төлөв</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						include 'db_connect.php';
						$qry = $conn->query("SELECT * FROM orders ");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['address'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['mobile'] ?></td>
								<?php if ($row['status'] == 1) : ?>
									<td class="text-center"><span class="badge badge-success">Баталгаажсан</span></td>
								<?php else : ?>
									<td class="text-center"><span class="badge badge-danger">Шинэ захиалга</span></td>
								<?php endif; ?>
								<td>
									<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>">Дэлгэрэнгүй</button>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<script>
	$('.view_order').click(function() {
		uni_modal('Захиалга дэлгэрэнгүй', 'view_order.php?id=' + $(this).attr('data-id'))
	})
	$('table').dataTable();
</script>