<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-md-6" style="padding-bottom: 150px;">
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
				<?php if (empty($data['data'])): ?>
				 	tambah
				 	<?php else: ?>
				 	ubah
				 <?php endif ?> suplayer
			</div>
			<div class="panel-body card-body">
				<div class="form-group">
					<label for="nama">nama</label>
					<input type="text" class="form-control" name="nama" placeholder="nama" value="<?php echo @$data['data']['nama'] ?>" required>
				</div>
				<div class="form-group">
					<label for="hp">No hp/wa</label>
					<input type="number" class="form-control" name="hp" placeholder="nomor hp/wa" value="<?php echo @$data['data']['hp'] ?>" required>
				</div>
				<div class="form-group">
					<label for="email">email</label>
					<input type="email" class="form-control" name="email" placeholder="email" value="<?php echo @$data['data']['email'] ?>" required>
				</div>
				<div class="form-group">
					<label for="alamat">alamat</label>
					<textarea class="form-control" name="alamat" placeholder="alamat" required><?php echo @$data['data']['alamat'] ?></textarea>
				</div>
			</div>
			<div class="panel-footer card-footer">
				<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan</button>
				<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</div>
	</form>
</div>