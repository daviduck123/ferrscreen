T<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashbard"></i> 
        Dashboard
      </a>
      <a href="#" class="current">
        Pembelian
      </a>
    </div>
    <h1>Pembelian</h1>
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
            <h5>Data Pembelian</h5>
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
                  <label class="control-label">Nomor Nota</label>
                  <div class="controls">
                    <input type="text" name="nomorNotaPembelian" id="nomorNotaPembelian">
                  </div>
                  <label class="control-label">Supplier</label>
                  <div class="controls">
                    <div id="supplierPembelian"></div>
                  </div>
                  <label class="control-label">Jatuh Tempo</label>
                  <div class="controls">
                    <input type="text" name="jatuhTempoPembelian" id="jatuhTempoPembelian">
                  </div>
                </div>
                <div class="span6">
                  <label class="control-label">Sales</label>
                  <div class="controls">
                    <textarea rows="4" cols="50" name="salesPembelian" id="salesPembelian"></textarea>
                  </div>
                  <label class="control-label">Tanggal</label>
                  <div class="controls">
                    <div  data-date="13-01-018" class="input-append date datepicker">
                      <input type="text" value=""  data-date-format="dd-mm-yyyy" class="span11" name='tglMasuk' id='tglMasuk'>
                      <span class="add-on"><i class="icon-th"></i></span> </div>
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
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                      <th>Keterangan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <!--<tfoot>
                    <tr>
                      <th></th>
                      <th>
                        <a href="#popKodeTabelPembelian" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Kode</a>
                      </th>
                      <th>
                        <a href="#popNamaTabelPembelian" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Nama</a>
                      </th>
                      <th>
                        <input type="text" name="hargaTabelPembelian" id="hargaTabelPembelian" placeholder="Masukkan harga">
                      </th>
                      <th>
                        <input type="text" name="jumlahTabelPembelian" id="jumlahTabelPembelian" placeholder="Masukkan jumlah">
                      </th>
                      <th>
                        <input type="text" name="subTotalTabelPembelian" id="subTotalTabelPembelian" placeholder="Subtotal" disabled>
                      </th>
                      <th>
                        <textarea rows="4" cols="50" name="keteranganTabelPembelian" id="keteranganTabelPembelian" placeholder="Masukkan keterangan"></textarea>
                      </th>
                      <th class="center">
                        <a href="<?php echo base_url();?>Pembelian/tambahTabelPembelian/" class="btn btn-success btn-mini" role="button">Tambah</a>
                      </th>
                    </tr>
                  </tfoot>-->
                  <tbody id='tBodyPembelian'>
                    <?php $this->load->view('Pembelian/v_tablePembelian', $dataPembelian); ?>
                  </tbody>
                </table>
            </div>
            <div class="control-group row-fluid">
              <div class="span6">
                <label class="control-label">Keterangan</label>
                <div class="controls">
                  <textarea rows="4" cols="50" name="keteranganPembelian" id="keteranganPembelian"></textarea>
                </div>
              </div>
              <div class="span6">
                <label class="control-label">Total</label>
                <div class="controls">
                  <input type="number" name="totalPenjualan" id="totalPenjualan">
                </div>
                <label class="control-label">PPN</label>
                <div class="controls">
                  <input type="number" name="biayaKirim" id="biayaKirim">
                </div>
                <label class="control-label">DU</label>
                <div class="controls">
                  <input type="number" name="du" id="du">
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

<!--modal Detail data-->
<div class="modal fade"  id="popTabelPembelian" style="width:50%; left:30%; " role="dialog" aria-labelledby="popKodeTabelPembelian" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
            </div>

            <div class = "modal-body">
             <div class="container-fluid">
                <div class="widget-box">
                  <div class="widget-title"> 
                    <span class="icon"><i class="icon-th"></i></span>
                    <span class="icon"><b>Data</b></span>
                  </div>
                  <div class="widget-content nopadding">
                    <div class="control-group">
                      <div class="span6">
                          <label class="control-label">Kode</label>
                          <div class="controls">
                            <input type="number" name="kodePopPembelian" id="kodePopPembelian">
                          </div>
                          <label class="control-label">Nama</label>
                          <div class="controls">
                            <input type="number" name="namaPopPembelian" id="namaPopPembelian">
                          </div>
                      </div>
                      <div class="span6">
                          <label class="control-label">Type</label>
                          <div class="controls">
                            <div id="tempatPopListTypePembelian"></div>
                          </div>
                          <label class="control-label">Merk</label>
                          <div class="controls">
                            <div id="tempatPopListMerkPembelian"></div>
                          </div>
                          <div class="controls">
                            <input type="submit" name="btnTambah" value="Cari" class="btn btn-info">
                          </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <table class="table table-bordered  scrollable " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Nomor</th>
                              <th>Nama</th>
                              <th>Kode</th>
                              <th>Merk</th>
                              <th>Supplier</th>
                              <th>Stok</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody id='tBodyPembelian'>
                           <?php 
                              if(isset($dataPembelian))
                              {
                                  $number=1;
                                  foreach ($dataPembelian as $pembelian) 
                                  {
                                      $btn = false;
                                      ?>
                                      <tr class="gradeX">
                                        <td style = "vertical-align: middle;"><?php echo $number ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $pembelian['nama'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $pembelian["kode"] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $pembelian['harga'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $pembelian['jumlah'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $pembelian['subTotal'] ?></td>
                                        <td class="center">
                                          <a href="<?php echo base_url();?>Pembelian/hapusPembelian/<?php echo $number ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
                                          <a href="#deleteData<?php echo $number ?>" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>

                                          <div id="deleteData<?php echo $number ?>" class="modal hide" aria-hidden="true" style="display: none;">
                                            <div class="modal-header">
                                              <button data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>Hapus Data</h3>
                                            </div>
                                            <div class="modal-body">
                                              <p>Apakah kamu ingin menghapus data <?php echo $number ?>?</p>
                                            </div>
                                            <div class="modal-footer"> 
                                              <a class="btn btn-primary" href="<?php echo base_url();?>Pembelian/hapusPenjualan/<?php echo $number ?>" name="btnHapus">Hapus</a> 
                                              <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                      <?php 
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
                <div id="divDetailBarang">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-github" data-dismiss="modal">Kembali</button>
                <button class="btn btn-github" data-dismiss="modal">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->

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
<script src="<?php echo asset_url();?>js/masked.js"></script> 
<script src="<?php echo asset_url();?>js/matrix.form_common.js"></script> 
<script src="<?php echo asset_url();?>js/jquery.peity.min.js"></script> 

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    var dataBarang = <?php echo json_encode($dataBarang) ?>;
    var dataSupplier = <?php echo json_encode($dataSupplier) ?>;
    var dataType = <?php echo json_encode($dataType) ?>;
    var dataMerk = <?php echo json_encode($dataMerk) ?>;

    var optionBarang = "";
    var optionSupplier = "";
    var optionType = "";
    var optionMerk = "";

    optionBarang += "<select class='col-xs-3' name='pilihPopMerkBarang' id='pilihPopMerkBarang'>;";
    for(var i = 0 ; i < dataBarang.length; i++){
      optionBarang += "<option  value="+dataBarang[i]['id']+">"+dataBarang[i]['nama']+"</option>"; 
    }
    optionBarang +='</select>';

    optionSupplier += "<select class='col-xs-3' name='pilihPopTypePembelian' id='pilihPopTypePembelian'>;";
    for(var i = 0 ; i < dataSupplier.length; i++){
      optionSupplier += "<option  value="+dataSupplier[i]['id']+">"+dataSupplier[i]['nama']+"</option>"; 
    }
    optionSupplier +='</select>';
    $("#supplierPembelian").html(optionSupplier);
    

    optionType += "<select class='col-xs-3' name='pilihPopTypePembelian' id='pilihPopTypePembelian'>;";
    for(var i = 0 ; i < dataType.length; i++){
      optionType += "<option  value="+dataType[i]['id']+">"+dataType[i]['nama']+"</option>"; 
    }
    optionType +='</select>';
    $("#tempatPopListTypePembelian").html(optionType);

    optionMerk += "<select class='col-xs-3' name='pilihPopMerkPembelian' id='pilihPopMerkPembelian'>;";
    for(var i = 0 ; i < dataMerk.length; i++){
      optionMerk += "<option  value="+dataMerk[i]['id']+">"+dataMerk[i]['nama']+"</option>"; 
    }
    optionMerk +='</select>';
    $("#tempatPopListMerkPembelian").html(optionMerk);

  });
</script>
</body>
</html>