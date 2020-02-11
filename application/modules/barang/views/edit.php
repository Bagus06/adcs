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
				 <?php endif ?> barang
			</div>
			<div class="panel-body card-body">
				<div class="form-group">
					<label for="nama">nama</label>
					<input type="text" class="form-control" name="nama" placeholder="nama" value="<?php echo @$data['data']['nama'] ?>" required>
				</div>
				<div class="form-group">
					<label for="harga_satuan">harga satuan</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="text" name="harga_satuan" class="form-control" value="<?php echo number_format(@$data['data']['harga_satuan'], "0", ",", "."); ?>" required>
						<div class="input-group-append">
							<span class="input-group-text">.-</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="jumlah">jumlah</label>
					<input type="number" class="form-control" name="jumlah" placeholder="jumlah" value="<?php echo @$data['data']['jumlah'] ?>" required>
				</div>
				<div class="form-group">
					<label for="ket">keterangan</label>
					<textarea class="form-control" name="ket" required><?php echo @$data['data']['keterangan'] ?></textarea>
				</div>
				<div class="form-group">
					<label for="sd">sumber dana</label>
					<textarea class="form-control" name="sd" required><?php echo @$data['data']['sumber_dana'] ?></textarea>
				</div>
				<div class="form-group">
					<label>suplayer</label>
					<select name="suplayer" class="custom-select">
						<option>
							<?php if (!empty($suplayer)) : ?>
								<?php foreach ($suplayer as $key => $value) : ?>
									<?php $selected = ''; ?>
									<?php if ($value['id'] == @$data['data']['suplayer_id']) : ?>
										<?php $selected = 'selected'; ?>
									<?php endif ?>
									<option value="<?php echo $value['id'] ?>" <?php echo $selected ?>><?php echo $value['nama']; ?></option>
								<?php endforeach ?>
							<?php endif ?>
						</option>
					</select>
				</div>
				<?php if (empty($data['data'])): ?>
					<div class="form-group">
						<label>sortir</label>
						<select name="sortir" class="custom-select">
							<option>
								<?php if (!empty($sortir)) : ?>
									<?php foreach ($sortir as $key => $value) : ?>
										<?php $selected = ''; ?>
										<?php if ($value['id'] == @$data['data']['sortir']) : ?>
											<?php $selected = 'selected'; ?>
										<?php endif ?>
										<option value="<?php echo $value['id'] ?>" <?php echo $selected ?>><?php echo $value['sortir'] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</option>
						</select>
					</div>
				<?php endif ?>
					<div class="form-group">
						<label>jenis barang</label>
						<select name="jenis_barang" class="custom-select">
							<option>
								<?php if (!empty($jenis)) : ?>
									<?php foreach ($jenis as $key => $value) : ?>
										<?php $selected = ''; ?>
										<?php if ($value['id'] == @$data['data']['jenis']) : ?>
											<?php $selected = 'selected'; ?>
										<?php endif ?>
										<option value="<?php echo $value['id'] ?>" <?php echo $selected ?>><?php echo $value['jenis'] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</option>
						</select>
					</div>
			</div>
			<div class="panel-footer card-footer">
				<button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Simpan</button>
				<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</div>
	</form>
</div>