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
     <a href="<?php echo base_url();?>karyawan" class="">
        Karyawan
      </a>
    </div>
    <h1>Edit Karyawan</h1>
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
            <h5>Edit Karyawan</h5>
          </div>
          <div class="widget-content nopadding">
             <?php 
            echo form_open("karyawan/prosesEditKaryawan",  
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
                <input type="text" name="namaKaryawan" id="namaKaryawan" value="<?php echo $dataKaryawan[0]['nama'];?>">
              </div>
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="alamatEmailKaryawan" id="alamatEmailKaryawan" value="<?php echo $dataKaryawan[0]['email'];?>">
              </div>
              <label class="control-label">Alamat</label>
              <div class="controls">
                <textarea class='span9' name="alamatKaryawan" id="alamatKaryawan"><?php echo $dataKaryawan[0]['alamat'];?></textarea>
              </div>
              <label class="control-label">Pilih Kota</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihKotaKaryawan" id="pilihKotaKaryawan">
                  <?php 
                  if(isset($dataKota))
                  {
                    foreach ($dataKota as $kota) 
                    {
                        if($dataKaryawan[0]['id_kota'] == $kota['id']){
                          echo "<option value='".$kota["id"]."' selected>".$kota["nama"]."</option>";    
                        }else{
                          echo "<option value='".$kota["id"]."'>".$kota["nama"]."</option>";                          
                        }
                    }
                  }
                  ?>
                </select>
              </div>
              <label class="control-label">Telepon</label>
              <div class="controls">
                <input type="text" name="teleponKaryawan" id="teleponKaryawan" value="<?php echo $dataKaryawan[0]['telp'];?>">
              </div>
              <label class="control-label">HP</label>
              <div class="controls">
                <input type="text" name="hpKaryawan" id="hpKaryawan" value="<?php echo $dataKaryawan[0]['hp'];?>">
              </div>
              <label class="control-label">Tanggal Masuk</label>
              <div class="controls">
                <div  data-date="13-01-2018" class="input-append date datepicker">
                  <input type="text" value="<?php echo $dataKaryawan[0]['tgl_masuk'];?>"  data-date-format="dd-mm-yyyy" class="span11" name='tglMasuk' id='tglMasuk'>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
              <label class="control-label tglKel">Tanggal Keluar</label>
              <div class="controls tglKel">
                <div  data-date="13-01-2018" class="input-append date datepicker">
                  <input type="text" value="<?php echo $dataKaryawan[0]['tgl_keluar'];?>"  data-date-format="dd-mm-yyyy" class="span11" name='tglKeluar' id='tglKeluar'>
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
              <label class="control-label">Deskripsi</label>
              <div class="controls">
                <textarea name="deskripsiKaryawan" id="deskripsiKaryawan" class="span9"><?php echo $dataKaryawan[0]['deskripsi'];?></textarea>
              </div>
              <div class="control-group">
                <label class="control-label">Jabatan</label>
                <div class="controls">
                  <select name="jabatan" id='jabatan'>
                    <?php 
                      foreach($dataJabatan as $jabatan){
                        if($dataKaryawan[0]['jabatan'][0]['id'] == $jabatan['id']){
                          ?>
                          <option value="<?php echo $jabatan['id'];?>" selected><?php echo $jabatan['nama']; ?></option>
                          <?php
                        }else{
                          ?>
                            <option value="<?php echo $jabatan['id'];?>"><?php echo $jabatan['nama']; ?></option>
                          <?php
                      }
                      }

                    ?>
                  </select>
                </div>
            </div>
            <label class="control-label"> </label>
            <div class="checkbox controls">
                <?php 
                  if($dataKaryawan[0]['is_aktif'] == "0")
                    echo '<label><input type="checkbox" value="is_aktif" name="is_aktif" id="is_aktif">Aktif</label>';
                  else
                    echo '<label><input type="checkbox" value="is_aktif" name="is_aktif" id="is_aktif" checked="checked">Aktif</label>';
                ?>
            </div>
            </div>
              <div class="form-actions">
                <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                <input type="submit" name="btnUpdate" value="Update" class="btn btn-success"/>
              </div>
              <input type="hidden" name='id' value="<?php echo $dataKaryawan[0]['id'];?>"/>
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
<script src="<?php echo asset_url();?>js/masked.js"></script> 
<script src="<?php echo asset_url();?>js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.peity.min.js"></script> 
<script src="<?php echo asset_url();?>js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
  
</script>
<script>
  $(document).ready(function(){

      $('#is_aktif').change(function() 
      {
        if(this.checked) 
        {
          var elements = document.getElementsByClassName('tglKel');
          for(var i = 0, length = elements.length; i < length; i++) 
          {
               elements[i].style.display = 'none';
          }
        } 
        else 
        {
          var elements = document.getElementsByClassName('tglKel');
          for(var i = 0, length = elements.length; i < length; i++) 
          {
               elements[i].style.display = 'block';
          }
        } 
      });
      $("#is_aktif").change();
  });
</script>
</body>
</html>