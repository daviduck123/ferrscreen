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
        Karyawan
      </a>
    </div>
    <h1>Karyawan</h1>
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
          <a href="<?php echo base_url();?>karyawan/tambahKaryawan"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Karyawan
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Jabatan</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                 <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat Supplier</th>
                  <th>Kota</th>
                  <th>Telepon</th>
                  <th>HP</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Keluar</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                if(isset($dataKaryawan))
                {
                    $number=1;
                    foreach ($dataKaryawan as $karyawan) 
                    {
                      ?>
                      <tr class="gradeX">
                        <td><?php echo $number; ?></td>
                        <td><?php echo $karyawan["nama"]; ?></td>
                        <td><?php echo $karyawan["email"]; ?></td>
                        <td><?php echo $karyawan["alamat"]; ?></td>
                        <td><?php echo $karyawan["nama_kota"]; ?></td>
                        <td><?php echo $karyawan["telp"]; ?></td>
                        <td><?php echo $karyawan["hp"]; ?></td>
                        <td><?php echo $karyawan["tgl_masuk"]; ?></td>
                        <td><?php echo $karyawan["tgl_keluar"]; ?></td>
                        <td><?php echo $karyawan['jabatan'][0]['nama']; ?></td>
                        <td><?php echo ($karyawan["is_aktif"] == "1" ? "Aktif":"Keluar"); ?></td>
                        <td class="center">
                          <a href="<?php echo base_url();?>karyawan/editKaryawan/<?php echo $karyawan["id"] ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
                          <a href="#deleteData<?php echo $karyawan["id"] ?>" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>

                          <div id="deleteData<?php echo $karyawan["id"] ?>" class="modal hide" aria-hidden="true" style="display: none;">
                              <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Hapus Data</h3>
                              </div>
                              <div class="modal-body">
                                <p>Apakah kamu ingin menghapus data <?php echo $karyawan["nama"] ?>?</p>
                              </div>
                              <div class="modal-footer"> 
                                <a class="btn btn-primary" href="<?php echo base_url();?>karyawan/hapusKaryawan/<?php echo $karyawan["id"] ?>" name="btnHapus">Hapus</a> 
                                <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                              </div>
                            </div>
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
</body>
</html>