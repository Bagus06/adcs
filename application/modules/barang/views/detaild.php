<!-- Main content -->
<section class="content">
  <?php if (!empty($data['msg'])): ?>
    <?php echo alert($data['status'],$data['msg']) ?>
    <?php if (!empty($data['msgs'])): ?>
      <?php foreach ($data['msgs'] as $key => $value): ?>
          <?php echo alert($data['status'], $value) ?>
        <?php endforeach ?> 
    <?php endif ?>
  <?php endif ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Detail Barang</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Sub Barang</h3>

                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 600px;">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>kode</th>
                            <th>Status</th>
                            <th>date update</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $baru = 0;
                            $rusak = 0;
                           ?>
                          <?php foreach ($data['data'] as $value): ?>
                            <?php
                              if ($value['sortir'] == 1) {
                                $baru++;
                              }
                              if ($value['sortir'] == 2) {
                                $rusak++;
                              }

                             ?>
                            <tr>
                              <td><?php echo $value['single_kode'] ?></td>
                              <td><?php echo $sortir[$value['sortir']] ?></td>
                              <td><?php 
                                  if ($value['updated_at'] != null) {
                                    echo $value['updated_at'];
                                  }elseif ($value['updated_at'] == null) {
                                    echo $value['created_at'];
                                  }
                               ?></td>
                               <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group">
                                  <a  data-toggle="modal" data-target="#modal-detaild<?php echo $value['id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                </div>
                              </td>
                            </tr>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> ADC Sys V0.1</h3>
              <br>
              <div class="text-muted">
                <p class="text-sm">Nama Barang
                  <b class="d-block"><?php echo $barang['nama']; ?></b>
                </p>
                <p class="text-muted"><?php echo $barang['keterangan']; ?></p>
              </div>

              <h5 class="mt-5 text-muted">Data barang</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary">Kode induk : <?php echo $barang['kode']; ?><a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">Jenis : <?php echo $jenis[$barang['jenis']] ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">suplayer : <?php echo $suplayer[$barang['suplayer_id']] ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">barang masuk : <?php echo $barang['date'] ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">barang baru : <?php echo $baru ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">barang rusak : <?php echo $rusak ?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">jumlah : <?php echo $barang['jumlah'] ?> barang</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">harga satuan : <?php echo "Rp " . number_format($barang['harga_satuan'],0,',','.');?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">total : <?php $total = $barang['jumlah']*$barang['harga_satuan']; echo "Rp " . number_format($total,0,',','.');?></a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary">Sumber Dana : <?php echo $barang['sumber_dana']; ?></a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="<?php echo base_url('barang/edit/'.$barang['id'])?>" class="btn btn-sm btn-primary">Edit Data</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    <?php
      $this->load->view($this->uri->rsegments[1] . '/' . 'modal_detaild.php');
    ?>