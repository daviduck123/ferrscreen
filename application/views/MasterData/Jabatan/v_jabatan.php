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
        Jabatan
      </a>
    </div>
    <h1>Jabatan</h1>
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
          <a href="<?php echo base_url();?>jabatan/tambahJabatan"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Jabatan
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
                  <th>Deskripsi</th>
                  <th>Hak Akses</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataJabatan))
                {
                    $number=1;
                    foreach ($dataJabatan as $jabatan) 
                    {
                      ?>
                      <tr class="gradeX">
                                <td><?php echo $number; ?></td>
                                <td><?php echo $jabatan["nama"]; ?></td>
                                <td><?php echo $jabatan["deskripsi"]; ?></td>
                                <td>
                                <?php foreach($jabatan['hak_akses'] as $hak_akses){ 
                                  echo $hak_akses['nama']."<br>";
                                }
                                ?>
                               </td>
                                <td class="center">
                                    <a href="<?php echo base_url();?>jabatan/editJabatan/<?php echo $jabatan["id"] ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
                                    <a href="#deleteData<?php echo $jabatan["id"] ?>" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>

                                    <div id="deleteData<?php echo $jabatan["id"] ?>" class="modal hide" aria-hidden="true" style="display: none;">
                                      <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                          <h3>Hapus Data</h3>
                                      </div>
                                      <div class="modal-body">
                                        <p>Apakah kamu ingin menghapus data <?php echo $jabatan["nama"] ?>?</p>
                                      </div>
                                      <div class="modal-footer"> 
                                        <a class="btn btn-primary" href="<?php echo base_url();?>jabatan/hapusJabatan/<?php echo $jabatan["id"] ?>" name="btnHapus">Hapus</a> 
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