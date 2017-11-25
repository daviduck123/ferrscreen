<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Penjualan</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Nota Penjualan</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Customer :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="First name">
                  </div>
                  <label class="control-label">Nomor Nota :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="Last name">
                  </div>
                  <label class="control-label">Jatuh Tempo</label>
                  <div class="controls">
                    <input type="password" class="span11" placeholder="Enter Password">
                  </div>
                </div>
              </div>
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Sales :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="First name">
                  </div>
                  <label class="control-label">Tanggal :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="Last name">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Simpan Nota</button>
                </div>
              </div>
            </form>
            <div class="content">
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
                </tr>
              </thead>
              <tbody id='tBodyPenjualan'>
                <?php $this->load->view('Penjualan/v_tablePenjualan', $dataPenjualan); ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
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
</body>
</html>