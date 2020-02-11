<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-md-12 row">
	<div class="col-md-3">
		<?php if (!empty($data['msg'])): ?>
			<?php echo alert($data['status'],$data['msg']) ?>
			<?php if (!empty($data['msgs'])): ?>
				<?php foreach ($data['msgs'] as $key => $value): ?>
						<?php echo alert($data['status'], $value) ?>
					<?php endforeach ?>	
			<?php endif ?>
		<?php endif ?>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="panel panel-default card card-default">
				<div class="panel-heading card-header">
					<?php if (empty($data['user'])): ?>
					 	tambah
					 	<?php else: ?>
					 	ubah
					 <?php endif ?> user role
				</div>
				<div class="panel-body card-body">
					<div class="form-group">
						<label for="title">title</label>
						<input type="text" class="form-control" name="title" placeholder="title" value="<?php echo @$data['user']['title'] ?>">
					</div>
					<div class="form-group">
						<label for="description">description</label>
						<textarea name="description" class="form-control" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="level">level</label>
						<input type="number" name="level" class="form-control">
					</div>
				</div>
				<div class="panel-footer card-footer">
					<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-undo"></i> Reset</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-9">
		<div class="card">
		  <div class="card-header">
		    <i class="fas fa-table"></i>
		    Data User Role</div>
		  <div class="card-body">
		    <div class="table-responsive">
		      <table id="example1" class="table table-bordered">
		        <thead>
		          <tr>
		            <th>No</th>
		            <th>title</th>
		            <th>description</th>
		            <th>level</th>
		            <th>action</th>
		          </tr>
		        </thead>
		        <tfoot>
		          <tr>
		            <th>No</th>
		            <th>title</th>
		            <th>description</th>
		            <th>level</th>
		            <th>action</th>
		          </tr>
		        </tfoot>
		        <tbody>
		        	<?php $i = 1; ?>
		        	<?php if (!empty($data['data'])): ?>
			        	<?php foreach ($data['data'] as $key => $value): ?>
				          <tr>
				            <td><?php echo $i ?></td>
				            <td><?php echo $value['title'] ?></td>
				            <td><?php echo $value['description'] ?></td>
				            <td><?php echo $value['level'] ?></td>
				            <td class="text-center py-0 align-middle">
				            	<div class="btn-group btn-group">
				            		<a href="<?php echo base_url('user/role_edit/'.$value['id'])?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
				            		<a href="<?php echo base_url('user/role_delete/'.$value['id'])?>" onclick="if(confirm('apakah anda yakin ingin menghapus <?php echo $value['title']?>')){}else{return false;};" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
		  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>		
	</div>
</div>