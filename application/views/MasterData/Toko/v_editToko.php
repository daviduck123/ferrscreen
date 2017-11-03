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
      <a href="<?php echo base_url();?>toko" class="">
        Toko
      </a>
      <a href="#" class="current">
        Edit Toko
      </a>
    </div>
    <h1>Edit Toko</h1>
  </div>
  <div class="container-fluid">
     <?php
     print_r($dataSelected);
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
            <h5>Edit Toko</h5>
          </div>
          <div class="widget-content nopadding">
            <?php 
            echo form_open("toko/prosesEditToko/".$idToko,  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
            <!-- <form class="form-horizontal" method="post" action="<?php echo base_url();?>toko/prosesTambahToko" name="basic_validate" id="basic_validate" novalidate="novalidate"> -->
            <div class="control-group">
              <label class="control-label">Kode Toko</label>
              <div class="controls">
                <input type="text" name="kodeToko" id="kodeToko" value ="<?php echo $dataSelected[0]["kode"] ?>">
              </div>
              <label class="control-label">Nama Toko</label>
              <div class="controls">
                <input type="text" name="namaToko" id="namaToko" value ="<?php echo $dataSelected[0]["nama"] ?>">
              </div>
              <label class="control-label">Contact Person</label>
              <div class="controls">
                <input type="text" name="contactPersonToko" id="contactPersonToko" value ="<?php echo $dataSelected[0]["contact_person"] ?>">
              </div>
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="alamatEmailToko" id="alamatEmailToko" value ="<?php echo $dataSelected[0]["email"] ?>">
              </div>
              <label class="control-label">Alamat Toko</label>
              <div class="controls">
                <textarea rows="4" cols="50" name="alamatToko" id="alamatToko"><?php echo $dataSelected[0]["alamat"] ?></textarea>
              </div>
              <label class="control-label">Pilih Kota</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihKotaToko" id="pilihKotaToko">
                  <?php 
                  if(isset($dataKota))
                  {
                    foreach ($dataKota as $kota) 
                    {
                      if($dataSelected[0]["id_kota"]==$kota["id"])
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
                <input type="text" name="kodePosToko" id="kodePosToko" value ="<?php echo $dataSelected[0]["kode_pos"] ?>">
              </div>
              <label class="control-label">Telepon</label>
              <div class="controls">
                <input type="text" name="teleponToko" id="teleponToko" value ="<?php echo $dataSelected[0]["telp"] ?>">
              </div>
              <label class="control-label">HP</label>
              <div class="controls">
                <input type="text" name="hpToko" id="hpToko" value ="<?php echo $dataSelected[0]["hp"] ?>">
              </div>
              <label class="control-label">Faximile</label>
              <div class="controls">
                <input type="text" name="faximileToko" id="faximileToko" value ="<?php echo $dataSelected[0]["fax"] ?>">
              </div>
              <label class="control-label">Limit Piutang</label>
              <div class="controls">
                <input type="number" name="limitPiutangToko" id="limitPiutangToko" value ="<?php echo $dataSelected[0]["limit_piutang"] ?>">
              </div>
              <label class="control-label">Jatuh Tempo</label>
              <div class="controls">
                <input type="number" name="jatuhTempoToko" id="jatuhTempoToko" value ="<?php echo $dataSelected[0]["jatuh_tempo"] ?>">
              </div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <?php
                  if($dataSelected[0]["is_aktif"]==0)
                    echo '<label><input type="checkbox" value="aktif" name="checkAktif" id="checkAktif">Aktif?</label>';
                  else
                    echo '<label><input type="checkbox" value="aktif" name="checkAktif" id="checkAktif" checked="checked">Aktif?</label>';
                ?>
              </div>
            </div>
              <div class="form-actions">
                <a href="<?php echo base_url();?>toko/" class="btn btn-info" role="button">Batal</a>
                <input type="submit" name="btnTambah" value="Ubah" class="btn btn-success"/>
              </div>
            <?php echo form_close(); ?>
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