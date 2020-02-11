<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12" style="padding-bottom: 150px;">
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
		Data User</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>username</th>
							<th>email</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>username</th>
							<th>email</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $i = 1; ?>
						<?php if (!empty($data)) : ?>
							<?php foreach ($data as $key => $value) : ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $value['username'] ?></td>
									<td><?php echo $value['email'] ?></td>
									<td class="text-center py-0 align-middle">
										<div class="btn-group btn-group">
											<a href="<?php echo base_url('user/edit/' . $value['id']) ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
											<a href="<?php echo base_url('user/delete/' . $value['id']) ?>" onclick="if(confirm('apakah anda yakin ingin menghapus <?php echo $value['username'] ?>')){}else{return false;};" class="btn btn-danger"><i class="fas fa-trash"></i></a>
										</div>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Support by : ESET</div>
	</div>
</div>