<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<li class="nav-item">
  <a href="<?php echo base_url(); ?>" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-user"></i>
		<p>
			User
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('user/list'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>List</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('user/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Tambah</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('user/role'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Role</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fab fa-audible"></i>
		<p>
			Barang
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('barang/list'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>List</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('barang/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Tambah</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fab fa-supple"></i>
		<p>
			Suplayer
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('suplayer/list'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>List</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('suplayer/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Tambah</p>
			</a>
		</li>
	</ul>
</li>