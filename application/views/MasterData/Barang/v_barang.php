<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashboard"></i> 
        Dashboard
      </a>
      <a href="#" class="">
        Master Data
      </a>
      <a href="#" class="current">
        Barang
      </a>
    </div>
    <h1>Barang</h1>
  </div>
  <div class="container-fluid">
   <?php
    if ($this->session->flashdata('error')) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">x</button>
        </div>
        <?php
    } else if ($this->session->flashdata('sukses')) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <?php echo $this->session->flashdata('sukses'); ?>
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">x</button>
        </div>
    <?php }
    ?>
    <?php echo validation_errors(); ?>
    <hr>
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> 
          <a href="<?php echo base_url();?>barang/tambahBarang"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Barang
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Barang</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Barang</th>
                  <th>Min Stok</th>
                  <th>Stok Tersedia</th>
                  <th>Kode</th>
                  <th>Nama Merk</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataBarang))
                {
                    $number=1;
                    foreach ($dataBarang as $barang) 
                    {
                        $btn = false;
                        ?>
                        <tr class="gradeX">
                          <td style = "vertical-align: middle;"><?php echo $number ?></td>
                          <td style = "vertical-align: middle;"><?php echo $barang['nama'] ?></td>
                          <td style = "vertical-align: middle;"><?php echo $barang['min_stok'] ?></td>
                          <td style = "vertical-align: middle;">
                            <?php echo $barang['total_stok']; ?>
                            <button style='float:right; margin-left: 3px;' value="<?php echo $barang["id"]; ?>" class="btn btn-info btn-mini">Detail Stok</button>
                            <button style='float:right; margin-left: 3px;' value="<?php echo $barang["id"]; ?>" class="btn btn-success btn-mini">Update Stok</button>
                          </td>
                          <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['kode'] ;?></br>
                             <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['nama_merk']; ?></br>
                           <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['harga']; ?></br>
                            <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['deskripsi']; ?></br>
                            <?php } ?>
                          </td>
                          <td style = "vertical-align: middle;">
                            <a href="<?php echo base_url();?>barang/editBarang/<?php echo $barang["id"] ?>" class="btn btn-success btn-mini" role="button">Edit</a>
                            <button value="<?php echo $barang["id"]; ?>" class="btn btn-warning btn-mini">Hapus</button>
                          </td>
                        </tr>
                        <?php 
                      $number++;
                    }
                  }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Similar-->
<div class="modal hide" id="modalSimilar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Tambah Similar Merk</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
              <label class="control-label">Pilih Merk</label>
              <div class="controls">
                <select multiple >
                  <option>First option</option>
                  <option selected>Second option</option>
                  <option>Third option</option>
                  <option>Fourth option</option>
                  <option>Fifth option</option>
                  <option>Sixth option</option>
                  <option>Seventh option</option>
                  <option>Eighth option</option>
                </select>
              </div>
        </div>
    </div>
    <div class="modal-footer"> 
      <a href="#" class="btn" data-dismiss="modal">Tutup</a>
    </div>
  </div>
</div>
<!-- Tutup Modal Similar -->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Ferrscreen Admin</div>
</div>
<!--end-Footer-part-->
<script src="<?php echo asset_url();?>js/jquery.min.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo asset_url();?>js/bootstrap.min.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.uniform.js"></script> 
<script src="<?php echo asset_url();?>js/select2.min.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo asset_url();?>js/matrix.js"></script> 
<script src="<?php echo asset_url();?>js/matrix.tables.js"></script>
<script>
</script>
</body>
</html>