T<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashbard"></i> 
        Dashboard
      </a>
      <a href="#" class="">
        Master Data
      </a>
      <a href="<?php echo base_url();?>karyawan" class="">
        Karyawan
      </a>
      <a href="#" class="current">
        Tambah Karyawan
      </a>
    </div>
    <h1>Tambah Karyawan</h1>
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
            <h5>Tambah Supplier</h5>
          </div>
          <div class="widget-content nopadding">
             <?php 
            echo form_open("karyawan/prosesTambahKaryawan",  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
            <div class="control-group">
              <label class="control-label">Nama Karyawan</label>
              <div class="controls">
                <input type="text" name="namaKaryawan" id="namaKaryawan">
              </div>
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="alamatEmailKaryawan" id="alamatEmailKaryawan">
              </div>
              <label class="control-label">Alamat</label>
              <div class="controls">
                <textarea class='span9' name="alamatKaryawan" id="alamatKaryawan"></textarea>
              </div>
              <label class="control-label">Pilih Kota</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihKotaKaryawan" id="pilihKotaKaryawan">
                  <?php 
                  if(isset($dataKota))
                  {
                    foreach ($dataKota as $kota) 
                    {
                      echo "<option value='".$kota["id"]."'>".$kota["nama"]."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <label class="control-label">Telepon</label>
              <div class="controls">
                <input type="number" name="teleponKaryawan" id="teleponKaryawan">
              </div>
              <label class="control-label">HP</label>
              <div class="controls">
                <input type="number" name="hpKaryawan" id="hpKaryawan">
              </div>
              <label class="control-label">Tanggal Masuk</label>
              <div class="controls">
                <div  data-date="13-01-018" class="input-append date datepicker">
                  <input type="text" value="15-01-2018"  data-date-format="dd-mm-yyyy" class="span11" name='tglMasuk' id='tglMasuk'>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
              <label class="control-label">Deskripsi</label>
              <div class="controls">
                <textarea name="deskripsiKaryawan" id="deskripsiKaryawan" class="span9"></textarea>
              </div>
              <div class="control-group">
                <label class="control-label">Jabatan</label>
                <div class="controls">
                  <select name="jabatan" id='jabatan'>
                    <?php 
                      foreach($dataJabatan as $jabatan){
                        ?>
                          <option value="<?php echo $jabatan['id'];?>"><?php echo $jabatan['nama']; ?></option>
                        <?php
                      }

                    ?>
                  </select>
                </div>
            </div>
            </div>
              <div class="form-actions">
                <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
              </div>
            <?php echo form_close();?>
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
<script src="<?php echo asset_url();?>js/bootstrap-datepicker.js"></script> 
<script src="<?php echo asset_url();?>js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.toggle.buttons.js"></script> 
<script src="<?php echo asset_url();?>js/masked.js"></script> 
<script src="<?php echo asset_url();?>js/matrix.form_common.js"></script> 
<script src="<?php echo asset_url();?>js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.peity.min.js"></script> 
<script src="<?php echo asset_url();?>js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
  
</script>
</body>
</html>