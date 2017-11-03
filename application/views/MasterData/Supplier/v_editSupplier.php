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
      <a href="<?php echo base_url();?>supplier" class="">
        Supplier
      </a>
      <a href="#" class="current">
        Edit Supplier
      </a>
    </div>
    <h1>Edit Supplier</h1>
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
            <h5>Edit Supplier</h5>
          </div>
          <div class="widget-content nopadding">
             <?php 
            echo form_open("supplier/prosesEditSupplier/".$idSupplier,  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
            <div class="control-group">
              <label class="control-label">Nama Supplier</label>
              <div class="controls">
                <input type="text" name="namaSupplier" id="namaSupplier" value="<?php echo $dataSupplier[0]["nama"] ?>">
              </div>
              <label class="control-label">Contact Person</label>
              <div class="controls">
                <input type="text" name="contactPersonSupplier" id="contactPersonSupplier" value="<?php echo $dataSupplier[0]["contact_person"] ?>">
              </div>
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="alamatEmailSupplier" id="alamatEmailSupplier" value="<?php echo $dataSupplier[0]["email"] ?>">
              </div>
              <label class="control-label">Alamat Supplier</label>
              <div class="controls">
                <textarea rows="4" cols="50" name="alamatSupplier" id="alamatSupplier"><?php echo $dataSupplier[0]["alamat"] ?></textarea>
              </div>
              <label class="control-label">Pilih Kota</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihKotaSupplier" id="pilihKotaSupplier">
                  <?php 
                  if(isset($dataKota))
                  {
                    foreach ($dataKota as $kota) 
                    {
                      if($dataSupplier[0]["id_kota"]==$kota["id"])
                        echo "<option value='".$kota["id"]."' selected>".$kota["nama"]."</option>";
                      else
                        echo "<option value='".$kota["id"]."'>".$kota["nama"]."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <label class="control-label">Kode Pos</label>
              <div class="controls">
                <input type="number" name="kodePosSupplier" id="kodePosSupplier" value="<?php echo $dataSupplier[0]["kode_pos"] ?>">
              </div>
              <label class="control-label">Telepon</label>
              <div class="controls">
                <input type="number" name="teleponSupplier" id="teleponSupplier" value="<?php echo $dataSupplier[0]["telp"] ?>">
              </div>
              <label class="control-label">HP</label>
              <div class="controls">
                <input type="number" name="hpSupplier" id="hpSupplier" value="<?php echo $dataSupplier[0]["hp"] ?>">
              </div>
              <label class="control-label">Faximile</label>
              <div class="controls">
                <input type="number" name="faximileSupplier" id="faximileSupplier" value="<?php echo $dataSupplier[0]["fax"] ?>">
              </div>
              <label class="control-label">Limit Piutang</label>
              <div class="controls">
                <input type="number" name="limitPiutangSupplier" id="limitPiutangSupplier" value="<?php echo $dataSupplier[0]["limit_hutang"] ?>">
              </div>
              <label class="control-label">Jatuh Tempo</label>
              <div class="controls">
                <input type="number" name="jatuhTempoSupplier" id="jatuhTempoSupplier" value="<?php echo $dataSupplier[0]["jatuh_tempo"] ?>">
              </div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <?php
                  if($dataSupplier[0]["is_aktif"]==0)
                    echo '<label><input type="checkbox" value="aktif" name="checkAktif" id="checkAktif">Aktif?</label>';
                  else
                    echo '<label><input type="checkbox" value="aktif" name="checkAktif" id="checkAktif" checked="checked">Aktif?</label>';
                ?>
              </div>
            </div>
              <div class="form-actions">
                <a href="<?php echo base_url();?>supplier/" class="btn btn-info" role="button">Batal</a>
                <input type="submit" name="btnTambah" value="Ubah" class="btn btn-success"/>
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
</body>
</html>