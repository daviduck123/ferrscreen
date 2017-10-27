<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashbard"></i> 
        Dashboard
      </a>
      <a href="#" class="">
        Master Data
      </a>
      <a href="#" class="current">
        Toko
      </a>
    </div>
    <h1>Toko</h1>
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
          <a href="<?php echo base_url();?>toko/tambahToko"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Toko
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Toko</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Toko</th>
                  <th>Nama Toko</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Alamat Toko</th>
                  <th>Kota</th>
                  <th>Kode Pos</th>
                  <th>Telepon</th>
                  <th>HP</th>
                  <th>Faximile</th>
                  <th>Limit Piutang</th>
                  <th>Jatuh Tempo</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataToko))
                {
                    $number=1;
                    foreach ($dataToko as $toko) 
                    {
                      echo ' <tr class="gradeX">
                                <td>'.$number.'</td>
                                <td>'.$toko["kode"].'</td>
                                <td>'.$toko["nama"].'</td>
                                <td>'.$toko["contact_person"].'</td>
                                <td>'.$toko["email"].'</td>
                                <td>'.$toko["alamat"].'</td>
                                <td>'.$toko["id_kota"].'</td>
                                <td>'.$toko["kode_pos"].'</td>
                                <td>'.$toko["telp"].'</td>
                                <td>'.$toko["hp"].'</td>
                                <td>'.$toko["fax"].'</td>
                                <td>'.$toko["limit_piutang"].'</td>
                                <td>'.$toko["jatuh_tempo"].'</td>
                                <td class="center">
                                    <button value="'.$toko["id"].'" class="btn btn-success btn-mini">Edit</button>
                                    <button value="'.$toko["id"].'" class="btn btn-warning btn-mini">Hapus</button>
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
</body>
</html>