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
              <table id ="mainTabelPenjualan" class="table scrollable nowrap" cellspacing="0" width="100%">
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
                    <tbody>
                    <tr class="gradeX">
                      <td></td>
                      <td>
                        <input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
                        <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
                      </td>
                      <td>
                        <input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
                        <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
                      </td>
                      <td>
                        <input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">
                      </td>
                      <td>
                        <input type="text" name="jumlahTabelPenjualan" id="jumlahTabelPenjualan" placeholder="Masukkan jumlah">
                      </td>
                      <td>
                        <input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled>
                      </td>
                      <td>
                        <textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>
                      </td>
                      <td class="center">
                        <a href="<?php echo base_url();?>penjualan/tambahTabelPenjualan/" class="btn btn-success btn-mini" role="button">Tambah</a>
                      </td>
                    </tr>
                    <tr class="gradeX">
                      <td></td>
                      <td>
                        <input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
                        <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
                      </td>
                      <td>
                        <input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
                        <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
                      </td>
                      <td>
                        <input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">
                      </td>
                      <td>
                        <input type="text" name="jumlahTabelPenjualan" id="jumlahTabelPenjualan" placeholder="Masukkan jumlah">
                      </td>
                      <td>
                        <input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled>
                      </td>
                      <td>
                        <textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>
                      </td>
                      <td class="center">
                        <a href="<?php echo base_url();?>penjualan/tambahTabelPenjualan/" class="btn btn-success btn-mini" role="button">Tambah</a>
                      </td>
                    </tr>
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
                      <table id="tablePop1Penjualan" class="table table-bordered display" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Nama Barang</th>
                            <th>Kode</th>
                            <th>Merk</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
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
                <button class="btn btn-github" onClick="" data-dismiss="modal">Kembali</button>
                <button class="btn btn-github" onClick="refreshMainTable();" data-dismiss="modal">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->

<!--modal Detail data-->
<div class="modal hide"  id="pop2TabelPenjualan" style="width:80%; left:30%; " role="dialog" aria-labelledby="pop2KodeTabelPenjualan" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Supplier & Jumlah</h4>
            </div>
            <div class = "modal-body">
             <div class="container-fluid">
                <div class="widget-box">
                  <div class="widget-title"> 
                    <span class="icon"><i class="icon-th"></i></span>
                    <span class="icon"><b>Data Barang Penjualan</b></span>
                  </div>
                  <div class="widget-content nopadding">
                    <div class="control-group">
                      <table id="tablepop2Penjualan" class="table table-bordered" cellspacing="0" width="100%">
                      </table>
                    </div> 
                    <div class="container control-group" style="margin-bottom:10px; margin-top:10px">
                      <div class="span6">
                          <label class="control-label">Kode</label>
                          <div class="controls">
                            <input type="text" name="kodepop2Penjualan" id="kodepop2Penjualan">
                          </div>
                          <label class="control-label">Nama Barang</label>
                          <div class="controls">
                            <input type="text" name="namaBarangpop2Penjualan" id="namaBarangpop2Penjualan">
                          </div>
                      </div>
                      <div class="span3">
                          <label class="control-label">Merk</label>
                          <div id="tempatpop2ListMerkPenjualan"></div>
                            <input type="hidden" id="hiddenTempatpop2ListMerkPenjualan" name="hiddenTempatpop2ListMerkPenjualan" value="">
                            <input onclick="cariBarang(this.value);" type="submit" name="btnCari" value="btnCari" class="btn btn-info">
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div id="divDetailBarang">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-github" onClick="" data-dismiss="modal">Kembali</button>
                <button class="btn btn-github" onClick="refreshMainTable();" data-dismiss="modal">Update</button>
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
  Array.prototype.remove = function(from, to) {
    var rest = this.slice((to || from) + 1 || this.length);
    this.length = from < 0 ? this.length + from : from;
    return this.push.apply(this, rest);
  };

  var dataBarangPop1Dipilih=[];

  $(document).ready(function() 
  {
    $('#mainTabelPenjualan').DataTable( {
      destroy: true,
      "scrollX": true,
      data: [ 
                [ 
                  '',
                  '<input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled> <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>',
                  '<input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled> <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>',
                  '<input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">',
                  '<input type="text" name="jumlahTabelPenjualan" id="jumlahTabelPenjualan" placeholder="Masukkan jumlah">',
                  '<input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled>',
                  '<textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>',
                  '<a href="<?php echo base_url();?>penjualan/tambahTabelPenjualan/" class="btn btn-success btn-mini" role="button">Tambah</a>'
               ]
              ],
      columns: [
                  { title: "Nomor" },
                  { title: "Nama Barang" },
                  { title: "Kode" },
                  { title: "Harga" },
                  { title: "Jumlah" },
                  { title: "Sub Total" },
                  { title: "keterangan" },
                  { title: "aksi" }
                ]
      });
  });

  function refreshMainTable()
  {
    console.log(dataBarangPop1Dipilih);
    var dataSet = [
              [ 
                  '',
                  '<input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled> <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>',
                  '<input type="text" name="disableBukaTabelPenjualan" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled> <a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>',
                  '<input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">',
                  '<input type="text" name="jumlahTabelPenjualan" id="jumlahTabelPenjualan" placeholder="Masukkan jumlah">',
                  '<input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled>',
                  '<textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>',
                  '<a href="<?php echo base_url();?>penjualan/tambahTabelPenjualan/" class="btn btn-success btn-mini" role="button">Tambah</a>'
               ]
    ];
    for (var i=0;i<dataBarangPop1Dipilih.length;i++)
    {
      var ii=i+1;
      var nama_barang = dataBarangPop1Dipilih[i][0][1]["nama"];
      var kode="";
      var id_barang = dataBarangPop1Dipilih[i][0][0]["id_barang"];
      //var nama_merk;
      
      for (var x=0;x<dataBarangPop1Dipilih[i].length;x++)
      {
        //console.log(dataBarangPop1Dipilih[i][x][0]["kode"]);
        if(dataBarangPop1Dipilih[i].length>1 && x==0)
        {
          kode += dataBarangPop1Dipilih[i][x][0]["kode"]+"<br>";
          //nama_merk = dataBarangPop1Dipilih[i][x][0]["nama_merk"];
        }
        else
        {
          kode += dataBarangPop1Dipilih[i][x][0]["kode"];
        }
      }

      var temp =  [
                    ii, 
                    nama_barang,
                    kode,
                    '<input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">',
                    '<input type="text" name="hargaTabelPenjualan" id="hargaTabelPenjualan" placeholder="Masukkan harga">',
                    '<input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled="">',
                    '<input type="text" name="subTotalTabelPenjualan" id="subTotalTabelPenjualan" placeholder="Subtotal" disabled="">',
                    '<a href="#pop2TabelPenjualan" onclick="openSecondTable('+id_barang+')" data-toggle="modal" data-id="'+id_barang+'" title="Add this item" class="btn btn-info btn-mini" role="button">Tambah Harga</a>'
                  ];
      dataSet.push(temp);
    }

    $('#mainTabelPenjualan').DataTable( {
      destroy: true,
      "scrollX": true,
      data: dataSet,
      columns: [
        { title: "Nomor" },
        { title: "Nama Barang" },
        { title: "Kode" },
        { title: "Harga" },
        { title: "Jumlah" },
        { title: "Sub Total" },
        { title: "keterangan" },
        { title: "aksi" }
      ]
    });
  }

  function batalPop1()
  {
    dataBarangPop1Dipilih=dataBarangPilihan;
  }

  function updatePop1()
  {
    dataBarangPop1Dipilih=dataBarangPilihan;

    //refresh MAIN datatables
  }

  function selectPop1MerkPenjualan(id_merk)
  {
    document.getElementById('hiddenTempatPop1ListMerkPenjualan').value=id_merk;
  }

  function tambahBarangPop1(id)
  {
    var cek=false;
    for(var x=0; x<dataBarangPop1Dipilih.length; x++)
    {
      //console.log(id+"|"+dataBarangPop1Dipilih[x]);
      if(id==dataBarangPop1Dipilih[x])
        cek=true;
    }

    if(!cek)
    {
      var link="detailBarang/allDetailBarangByIdBarang";
      $(document).ready(function(){
        $.ajax({ 
          url: link,
          data:{ id:id}, 
          type: 'POST'
        }).done(function(dataDetailBarang){

          var parseDataDetailBarang = JSON.parse(dataDetailBarang);
          //console.log(parseDataDetailBarang);
          //console.log(parseDataDetailBarang["dataDetailBarang"]);
          //console.log(parseDataDetailBarang["dataDetailBarang"][0]);
          //console.log(parseDataDetailBarang["dataDetailBarang"][0]["id_barang"]);

          var text;
          var cek=0;
          var dataPerId=[];
          for (var i=0;i<parseDataDetailBarang["dataDetailBarang"].length;i++)
          {
            text = '{"'+id+'":[';
            //AMBIL DATA BARANG
            var dataBarang = <?php echo json_encode($dataBarang) ?>;
            var temp =[];
            for (var x=0;x<dataBarang.length;x++)
            {
              if(dataBarang[x]["id"]==parseDataDetailBarang["dataDetailBarang"][i]["id_barang"])
              {
                temp.push(parseDataDetailBarang["dataDetailBarang"][i]);
                temp.push(dataBarang[x]);
              }
            }
            dataPerId.push(temp);
            text += ']';
          }
          text += '}';
          dataBarangPop1Dipilih.push(dataPerId);
          //console.log(dataBarangPop1Dipilih.length);
          console.log(dataBarangPop1Dipilih);
          //console.log(dataBarangPop1Dipilih[0][0][0]["id"]);
          cariBarang("refresh");

        }).fail(function(x){
          console.log("Pengambilan data barang gagal", 'Perhatian!');
        });  
      }); 
    }
  }

  function hapusBarangPop1(id)
  {
    //DISINI MASIH RANCU
    var index = dataBarangPop1Dipilih.indexOf(id);
    dataBarangPop1Dipilih.splice(index, 1);

    //refresh datatables
    cariBarang("refresh");
  }

  function cariBarang(button)
  {
    var kodeBarang = document.getElementById('kodePop1Penjualan').value;
    var namaBarang = document.getElementById('namaBarangPop1Penjualan').value;
    var id_merk = document.getElementById('hiddenTempatPop1ListMerkPenjualan').value;

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

        var parsedDataBarang = JSON.parse(dataBarang);

        var dataSet=[];

        for (var i=0;i<parsedDataBarang.length;i++)
        {
          var ii=i+1;
          var cek=false;
          for(var x=0; x<dataBarangPop1Dipilih.length; x++)
          {
            if(parsedDataBarang[i]["id"]==dataBarangPop1Dipilih[x][0][0]["id_barang"])
            {
              cek=true;
              //console.log(parsedDataBarang[i]["id"]);
              //console.log(dataBarangPop1Dipilih[x][0][0]["id_barang"]);
            }
          }

          if(cek)
            var temp=[ii,parsedDataBarang[i]["nama"],parsedDataBarang[i]["kode"],parsedDataBarang[i]["nama_merk"],'<a class="btn btn-danger btn-mini" onclick="hapusBarangPop1('+parsedDataBarang[i]["id"]+')" name="btnHapus">Hapus</a>'];
          else
            var temp=[ii,parsedDataBarang[i]["nama"],parsedDataBarang[i]["kode"],parsedDataBarang[i]["nama_merk"],'<a class="btn btn-success btn-mini" onclick="tambahBarangPop1('+parsedDataBarang[i]["id"]+')" name="btnTambah">Tambah</a>'];

          dataSet.push(temp);
        }

        $('#tablePop1Penjualan').DataTable( {
            destroy: true,
            data: dataSet,
            columns: [
                { title: "Nomor" },
                { title: "Nama Barang" },
                { title: "Kode" },
                { title: "Merk" },
                { title: "Aksi" }
            ]
        });

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
      {
        optionMerk += "<option  value=''>Semua Merk</option>"; 
        optionMerk += "<option  value="+dataMerk[i]['id']+">"+dataMerk[i]['nama']+"</option>"; 
      }
      else
        optionMerk += "<option  value="+dataMerk[i]['id']+">"+dataMerk[i]['nama']+"</option>"; 
    }
    optionMerk +='</select>';
    $("#tempatPop1ListMerkPenjualan").html(optionMerk);

  });
</script>
</body>
</html>