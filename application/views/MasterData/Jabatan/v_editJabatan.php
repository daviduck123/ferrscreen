<?php
                  if(count($dataJabatanAll[0]["hak_akses"]) > 0)
                  {
                    foreach($dataJabatanAll[0]["hak_akses"] as $hak_akses)
                    {
                      $cek=0;
                      if(count($dataJabatan[0]["hak_akses"]) > 0)
                      {
                        foreach($dataJabatan[0]["hak_akses"] as $data)
                        {
                          if($hak_akses['id']==$data['id'])
                            $cek=1;
                        }
                      }
                      if($cek==1)
                        {
                        ?>
                          <option value="<?php echo $data['id']; ?>" selected><?php echo $data['nama']; ?></option>
                        <?php
                        }
                        else
                        {
                        ?>
                          <option value="<?php echo $hak_akses['id']; ?>"><?php echo $hak_akses['nama']; ?></option>
                        <?php
                        }
                    }
                  }
//print_r ($dataJabatanAll[0]["hak_akses"]);
//exit();
?>
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
      <a href="<?php echo base_url();?>jabatan" class="">
        Jabatan
      </a>
      <a href="#" class="current">
        Tambah Jabatan
      </a>
    </div>
    <h1>Tambah Jabatan</h1>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Tambah Jabatan</h5>
          </div>
          <div class="widget-content nopadding">
             <?php 
            echo form_open("jabatan/prosesEditJabatan/".$idEditJabatan,  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
            <div class="control-group">
              <label class="control-label">Nama Jabatan</label>
              <div class="controls">
                <input type="text" name="namaJabatan" id="namaJabatan" value="<?php echo $dataJabatan[0]['nama']; ?>">
              </div>
              <label class="control-label">Keterangan</label>
              <div class="controls">
                <textarea class='span9' name="deskripsi" value="<?php echo $dataJabatan[0]['deskripsi']; ?>"></textarea>
              </div>
              <label class="control-label">Hak Akses</label>
              <div class="controls">
                <select name="hak_akses[]" id='hak_akses' multiple>
                  <?php 
                  if(count($dataJabatanAll[0]["hak_akses"]) > 0)
                  {
                    foreach($dataJabatanAll[0]["hak_akses"] as $hak_akses)
                    {
                      $cek=0;
                      if(count($dataJabatan[0]["hak_akses"]) > 0)
                      {
                        foreach($dataJabatan[0]["hak_akses"] as $data)
                        {
                          if($hak_akses['id']==$data['id'])
                            $cek=1;
                        }
                      }
                      if($cek==1)
                        {
                        ?>
                          <option value="<?php echo $hak_akses['id']; ?>" selected><?php echo $hak_akses['nama']; ?></option>
                        <?php
                        }
                        else
                        {
                        ?>
                          <option value="<?php echo $hak_akses['id']; ?>"><?php echo $hak_akses['nama']; ?></option>
                        <?php
                        }
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
              <div class="form-actions">
                <a href="<?php echo base_url();?>jabatan/" class="btn btn-info" role="button">Batal</a>
                <input type="submit" name="btnTambah" value="Ubah" class="btn btn-success"/>
              </div>
            <?php  echo form_close(); ?>
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