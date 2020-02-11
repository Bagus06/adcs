<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-md-12" style="padding-bottom: 150px;">
	<div class="card">
	  <div class="card-header">
	    <i class="fas fa-table"></i>
	    Data suplayer
	    <a href="<?php echo base_url('suplayer/download_template') ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i> template</a>
	    <a href="<?php echo base_url('suplayer/upload') ?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> upload</a>
	  </div>
	  <div class="card-body">
	    <div class="table-responsive">
	      <table id="example1" class="table table-bordered">
	        <thead>
	          <tr>
	            <th>No</th>
	            <th>nama</th>
	            <th>hp/wa</th>
	            <th>email</th>
	            <th>alamat</th>
	            <th></th>
	          </tr>
	        </thead>
	        <tfoot>
	          <tr>
	            <th>No</th>
	            <th>nama</th>
	            <th>hp/wa</th>
	            <th>email</th>
	            <th>alamat</th>
	            <th></th>
	          </tr>
	        </tfoot>
	        <tbody>
	        	<?php $i = 1; ?>
	        	<?php if (!empty($data['data'])): ?>
		        	<?php foreach ($data['data'] as $key => $value): ?>
			          <tr>
			            <td><?php echo $i ?></td>
			            <td><?php echo $value['nama'] ?></td>
			            <td><?php echo $value['hp']; ?></td>
			            <td><?php echo $value['email'] ?></td>
			            <td><?php echo $value['alamat']; ?></td>
			            <td class="text-center py-0 align-middle">
			            	<div class="btn-group btn-group">
			            		<a href="<?php echo base_url('barang/list/'.$value['id'])?>" class="btn btn-success"><span>view</span></a>
			            		<a href="<?php echo base_url('suplayer/edit/'.$value['id'])?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
			            		<a href="<?php echo base_url('suplayer/delete/'.$value['id'])?>" onclick="if(confirm('Anda yakin ingin menghapus suplayer <?php echo $value['nama']?>')){}else{return false;};" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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