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
            echo form_open("supplier/prosesTambahSupplier",  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
            <div class="control-group">
              <div class="span6">
                  <label class="control-label">Customer</label>
                  <div class="controls">
                    <input type="text" name="customerPenjualan" id="customerPenjualan">
                  </div>
                  <label class="control-label">Nomor Nota</label>
                  <div class="controls">
                    <input type="text" name="nomorNotaPenjualan" id="nomorNotaPenjualan">
                  </div>
                  <label class="control-label">Jatuh Tempo</label>
                  <div class="controls">
                    <input type="text" name="jatuhTempoPenjualan" id="jatuhTempoPenjualan">
                  </div>
                </div>
                <div class="span6">
                  <label class="control-label">Sales</label>
                  <div class="controls">
                    <textarea rows="4" cols="50" name="salesPenjualan" id="salesPenjualan"></textarea>
                  </div>
                  <label class="control-label">Tanggal</label>
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
                  <div class="controls">
                    <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                    <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
                  </div>
              </div>
            </div>
            <div class="form-actions">
              <table class="table table-bordered  scrollable " cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                      <th>Keterangan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>
                        <a href="#popKodeTabelPenjualan" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Kode</a>
                      </th>
                      <th>
                        <a href="#popNamaTabelPenjualan" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Nama</a>
                      </th>
                      <th>
                        <input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">
                      </th>
                      <th>
                        <input type="text" name="jumlahTabelPenjualan" id="jumlahTabelPenjualan" placeholder="Masukkan jumlah">
                      </th>
                      <th>
                        <input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled>
                      </th>
                      <th>
                        <textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>
                      </th>
                      <th class="center">
                        <a href="<?php echo base_url();?>penjualan/tambahTabelPenjualan/" class="btn btn-success btn-mini" role="button">Tambah</a>
                      </th>
                    </tr>
                  </tfoot>
                  <tbody id='tBodyPenjualan'>
                    <?php $this->load->view('Penjualan/v_tablePenjualan', $dataPenjualan); ?>
                  </tbody>
                </table>
            </div>
            <div class="control-group">
              <div class="span6">
                  <label class="control-label">Keterangan</label>
                  <div class="controls">
                    <textarea rows="4" cols="50" name="keteranganPenjualan" id="keteranganPenjualan"></textarea>
                  </div>
                </div>
                <div class="span6">
                  <label class="control-label">Total</label>
                  <div class="controls">
                    <input type="number" name="totalPenjualan" id="totalPenjualan">
                  </div>
                  <label class="control-label">Biaya Kirim</label>
                  <div class="controls">
                    <input type="number" name="biayaKirim" id="biayaKirim">
                  </div>
                  <label class="control-label">Grand Total</label>
                  <div class="controls">
                    <input type="number" name="grandTotal" id="grandTotal">
                  </div>
              </div>
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