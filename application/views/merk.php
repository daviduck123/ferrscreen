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
        Merk
      </a>
    </div>
    <h1>Merk</h1>
  </div>
  <div class="container-fluid">
  <?php 
      if(isset($dataInfo))
      {
        $text= '<div class="alert ';

        if($dataInfo["status"]=="0")
          $text.="alert-error";
        else if ($dataInfo["status"]=="1") 
          $text.="alert-success";
        else
          $text.="alert-info";

        $text.=' alert-block"> 
                  <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">';
        
        if($dataInfo["status"]=="0")
          $text.="Gagal!";
        else if ($dataInfo["status"]=="1") 
          $text.="Berhasil!";
        else
          $text.="Pemberitahuan";

        $text.='</h4>'.$dataInfo["keterangan"].'</div>';
        echo $text;
      }
  ?>
    <hr>
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> 
          <a href="<?php echo base_url();?>merk/tambahMerk"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Merk
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Merk</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>List Merk</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataMerk))
                {
                    $number=1;
                    foreach ($dataMerk as $merk) 
                    {
                      echo ' <tr class="gradeX">
                                <td>'.$number.'</td>
                                <td>'.$merk["nama"].'</td>
                                <td>'.$merk["keterangan"].'</td>
                                <td class="center">
                                    <button value="'.$merk["id"].'" class="btn btn-success btn-mini">Edit</button>
                                    <button value="'.$merk["id"].'" class="btn btn-warning btn-mini">Hapus</button>
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