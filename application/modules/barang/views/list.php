<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-md-12" style="padding-bottom: 150px;">
	<div class="card">
	  <div class="card-header">
	    <i class="fas fa-table"></i>
	    Data barang
	    <a href="<?php echo base_url('barang/download_template') ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i> template</a>
	    <a href="<?php echo base_url('barang/upload') ?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> upload</a>
	   	<div class="input-group-prepend">
	   		<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
	    	Filter
	   		</button>
	   		<ul class="dropdown-menu">
	   			<li class="dropdown-item"><a href="<?php echo $url;?>?filter=1">Asset</a></li>
	   			<li class="dropdown-item"><a href="<?php echo $url;?>?filter=2">Sekali pakai</a></li>
	   		</ul>
	   	</div>
	  </div>
	  <div class="card-body">
	    <div class="table-responsive">
	      <table id="example1" class="table table-bordered">
	        <thead>
	          <tr>
	            <th>No</th>
	            <th>kode</th>
	            <th>nama</th>
	            <th>jenis barang</th>
	            <th>date</th>
	            <th></th>
	          </tr>
	        </thead>
	        <tfoot>
	          <tr>
	            <th>No</th>
	            <th>kode</th>
	            <th>nama</th>
	            <th>jenis barang</th>
	            <th>date</th>
	            <th></th>
	          </tr>
	        </tfoot>
	        <tbody>
	        	<?php $i = 1; ?>
	        	<?php if (!empty($data['data'])): ?>
		        	<?php foreach ($data['data'] as $key => $value): ?>
			          <tr>
			            <td><?php echo $i ?></td>
			            <td><?php echo $value['kode'] ?></td>
			            <td><?php echo $value['nama'] ?></td>
			            <td><?php echo $jenis[$value['jenis']] ?></td>
			            <td><?php echo $value['date'] ?></td>
			            <td class="text-center py-0 align-middle">
			            	<div class="btn-group btn-group">
			            		<a href="<?php echo base_url('barang/detaild/'.$value['id'])?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
			            		<a href="<?php echo base_url('barang/edit/'.$value['id'])?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
			            		<a href="<?php echo base_url('barang/delete/'.$value['id'])?>" onclick="if(confirm('data induk kode <?php echo $value['kode']?>')){}else{return false;};" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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