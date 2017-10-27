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
        Tambah Supplier
      </a>
    </div>
    <h1>Tambah Supplier</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Tambah Supplier</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>supplier/prosesTambahSupplier" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">Kode Supplier</label>
              <div class="controls">
                <input type="text" name="kodeSupplier" id="kodeSupplier">
              </div>
              <label class="control-label">Nama Supplier</label>
              <div class="controls">
                <input type="text" name="namaSupplier" id="namaSupplier">
              </div>
              <label class="control-label">Contact Person</label>
              <div class="controls">
                <input type="text" name="contactPersonSupplier" id="contactPersonSupplier">
              </div>
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="alamatEmailSupplier" id="alamatEmailSupplier">
              </div>
              <label class="control-label">Alamat Supplier</label>
              <div class="controls">
                <textarea rows="4" cols="50" name="alamatSupplier" id="alamatSupplier"></textarea>
              </div>
              <label class="control-label">Pilih Kota</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihKotaSupplier" id="pilihKotaSupplier">
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
              <label class="control-label">Kode Pos</label>
              <div class="controls">
                <input type="text" name="kodePosSupplier" id="kodePosSupplier">
              </div>
              <label class="control-label">Telepon</label>
              <div class="controls">
                <input type="text" name="teleponSupplier" id="teleponSupplier">
              </div>
              <label class="control-label">HP</label>
              <div class="controls">
                <input type="text" name="hpSupplier" id="hpSupplier">
              </div>
              <label class="control-label">Faximile</label>
              <div class="controls">
                <input type="text" name="faximileSupplier" id="faximileSupplier">
              </div>
              <label class="control-label">Limit Piutang</label>
              <div class="controls">
                <input type="number" name="limitPiutangSupplier" id="limitPiutangSupplier">
              </div>
              <label class="control-label">Jatuh Tempo</label>
              <div class="controls">
                <input type="number" name="jatuhTempoSupplier" id="jatuhTempoSupplier">
              </div>
            </div>
              <div class="form-actions">
                <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
              </div>
            </form>
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