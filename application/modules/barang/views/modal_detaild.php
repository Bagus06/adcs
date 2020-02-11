<?php foreach ($data['data'] as $modal): ?>
  <div class="modal fade" id="modal-detaild<?php echo $modal['id'] ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Status</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="col-sm-12">
              <!-- select -->
              <div class="form-group">
                <input name="id" type="hidden" value="<?php echo $modal['id'] ?>">
                <select name="sortir" class="form-control">
                  <?php if (!empty($select)) : ?>
                    <?php foreach ($select as $key => $value_sortir) : ?>
                      <?php $selected = ''; ?>
                      <?php if ($value_sortir['id'] == @$modal['sortir']) : ?>
                        <?php $selected = 'selected'; ?>
                      <?php endif ?>
                      <option value="<?php echo $value_sortir['id'] ?>" <?php echo $selected ?>><?php echo $value_sortir['sortir']; ?></option>
                    <?php endforeach ?>
                  <?php endif ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach ?>