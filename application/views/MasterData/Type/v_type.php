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
        Type
      </a>
    </div>
    <h1>Type</h1>
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
          <a href="<?php echo base_url();?>type/tambahType"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Type
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Type</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>List Type</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataType))
                {
                    $number=1;
                    foreach ($dataType as $type) 
                    {
                      echo ' <tr class="gradeX">
                                <td>'.$number.'</td>
                                <td>'.$type["nama"].'</td>
                                <td>'.$type["keterangan"].'</td>
                                <td class="center">
                                    <a href="'.base_url().'type/editType/'.$type["id"].'" class="btn btn-warning btn-mini" role="button">Edit</a>
                                    <a href="#deleteData'.$type["id"].'" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>

                                    <div id="deleteData'.$type["id"].'" class="modal hide" aria-hidden="true" style="display: none;">
                                      <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>Hapus Data</h3>
                                      </div>
                                      <div class="modal-body">
                                        <p>Apakah kamu ingin menghapus data '.$type["nama"].'?</p>
                                      </div>
                                      <div class="modal-footer"> 
                                        <a class="btn btn-primary" href="'.base_url().'type/hapusType/'.$type["id"].'" name="btnHapus">Hapus</a> 
                                        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                                      </div>
                                    </div>
                                </td>
                              </tr>';
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
<script>
</script>
</body>
</html>