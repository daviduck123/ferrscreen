<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashbard"></i> 
        Dashboard
      </a>
      <a href="#" class="current">
        Penjualan
      </a>
    </div>
    <h1>Nota Penjualan</h1>
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
            <h5>Data Penjualan</h5>
          </div>
          <div class="widget-content nopadding">
             <?php 
            echo form_open("penjualan/prosesTambahPenjualan",  
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
                    <select name="pilihCustomerPenjualan" id="pilihCustomerPenjualan">
                      <?php
                        if(isset($dataToko))
                        {
                          foreach ($dataToko as $toko) 
                          {
                            echo "<option value='".$toko['id']."'>".$toko['nama']."</option>";
                          }
                        }
                      ?>
                    </select>
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
                    <select name="pilihSalesPenjualan" id="pilihSalesPenjualan">
                      <?php
                        if(isset($dataUser))
                        {
                          foreach ($dataUser as $user) 
                          {
                            echo "<option value='".$user['id']."'>".$user['nama']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <label class="control-label">Tanggal</label>
                  <div class="controls">
                    <div  data-date="13-01-018" class="input-append date datepicker">
                      <input type="text" value=""  data-date-format="dd-mm-yyyy" class="span11" name='tanggalPenjualan' id='tanggalPenjualan'>
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                  </div>
                  <div class="controls">
                    <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                    <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
                  </div>
              </div>
            </div>
            <div class="form-actions">
              <table class="table scrollable nowrap" cellspacing="0" width="100%">
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
                  <tbody id='tBodyPenjualan'>
                    <?php $this->load->view('Penjualan/v_tablePenjualan', $dataPenjualan); ?>
                  </tbody>
                </table>
            </div>
            <div class="control-group row-fluid">
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

<!--modal Detail data-->
<div class="modal hide"  id="pop1TabelPenjualan" style="width:80%; left:30%; " role="dialog" aria-labelledby="pop1KodeTabelPenjualan" aria-hidden="true" >
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
                    <div class="container control-group" style="margin-bottom:10px; margin-top:10px">
                      <div class="span6">
                          <label class="control-label">Kode</label>
                          <div class="controls">
                            <input type="text" name="kodePop1Penjualan" id="kodePop1Penjualan">
                          </div>
                          <label class="control-label">Nama Barang</label>
                          <div class="controls">
                            <input type="text" name="namaBarangPop1Penjualan" id="namaBarangPop1Penjualan">
                          </div>
                      </div>
                      <div class="span3">
                          <label class="control-label">Merk</label>
                          <div id="tempatPop1ListMerkPenjualan"></div>
                            <input type="hidden" id="hiddenTempatPop1ListMerkPenjualan" name="hiddenTempatPop1ListMerkPenjualan" value="">
                            <input onclick="cariBarang(this.value);" type="submit" name="btnCari" value="btnCari" class="btn btn-info">
                          </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <table id="tablePop1Penjualan" class="table table-bordered  scrollable " cellspacing="0" width="100%">
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
                          <tbody id='tBodyPenjualan'>
                           <?php 
                              if(isset($dataPenjualan))
                              {
                                  $number=1;
                                  foreach ($dataPenjualan as $penjualan) 
                                  {
                                      $btn = false;
                                      ?>
                                      <tr class="gradeX">
                                        <td style = "vertical-align: middle;"><?php echo $number ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $penjualan['nama'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $penjualan["kode"] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $penjualan['harga'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $penjualan['jumlah'] ?></td>
                                        <td style = "vertical-align: middle;"><?php echo $penjualan['subTotal'] ?></td>
                                        <td class="center">
                                          <a href="<?php echo base_url();?>penjualan/hapusPenjualan/<?php echo $number ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
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
                                              <a class="btn btn-primary" href="<?php echo base_url();?>penjualan/hapusPenjualan/<?php echo $number ?>" name="btnHapus">Hapus</a> 
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

  function selectPop1MerkPenjualan(id_merk)
  {

    document.getElementById('hiddenTempatPop1ListMerkPenjualan').value=id_merk;
  }

  function cariBarang(button)
  {
    var kodeBarang = document.getElementById('kodePop1Penjualan').value;
    var namaBarang = document.getElementById('namaBarangPop1Penjualan').value;
    var id_merk = document.getElementById('hiddenTempatPop1ListMerkPenjualan').value;

    //var link=urlnya+'/Barang/cariBarangBySearch?kodeBarang='+kodeBarang+'&namaBarang='+namaBarang+'&id_merk='+id_merk;
    var link='barang/cariBarangBySearch';
    $(document).ready(function(){
      $.ajax({ 
        url: link,
        data:{ kodeBarang:kodeBarang,  
                namaBarang:namaBarang,
                id_merk:id_merk,
                button:button }, 
        type: 'POST'
      }).done(function(dataBarang){

        console.log(dataBarang);

      }).fail(function(x){
        console.log("Pengambilan data barang gagal", 'Perhatian!');
      });                 
    });
  }

  $(document).ready(function(){
    var dataBarang = <?php echo json_encode($dataBarang) ?>;
    var dataSupplier = <?php echo json_encode($dataSupplier) ?>;
    var dataType = <?php echo json_encode($dataType) ?>;
    var dataMerk = <?php echo json_encode($dataMerk) ?>;

    var optionBarang = "";
    var optionSupplier = "";
    var optionType = "";
    var optionMerk = "";

    optionBarang += "<select class='col-xs-3' name='pilihPop1MerkBarang' id='pilihPop1MerkBarang'>;";
    for(var i = 0 ; i < dataBarang.length; i++){
      optionBarang += "<option  value="+dataBarang[i]['id']+">"+dataBarang[i]['nama']+"</option>"; 
    }
    optionBarang +='</select>';

    for(var i = 0 ; i < dataSupplier.length; i++){
      optionSupplier += "<option  value="+dataSupplier[i]['id']+">"+dataSupplier[i]['nama']+"</option>"; 
    }

    optionType += "<select class='col-xs-3' name='pilihPop1TypePenjualan' id='pilihPop1TypePenjualan'>;";
    for(var i = 0 ; i < dataType.length; i++){
      optionType += "<option  value="+dataType[i]['id']+">"+dataType[i]['nama']+"</option>"; 
    }
    optionType +='</select>';
    $("#tempatPop1ListTypePenjualan").html(optionType);

    optionMerk += "<select onchange='selectPop1MerkPenjualan(this.value)' class='col-xs-3' name='pilihPop1MerkPenjualan' id='pilihPop1MerkPenjualan'>;";
    for(var i = 0 ; i < dataMerk.length; i++){
      if(i==0)
        optionMerk += "<option  value=''>Semua Merk</option>"; 
      else
        optionMerk += "<option  value="+dataMerk[i]['id']+">"+dataMerk[i]['nama']+"</option>"; 
    }
    optionMerk +='</select>';
    $("#tempatPop1ListMerkPenjualan").html(optionMerk);

  });
</script>
</body>
</html>