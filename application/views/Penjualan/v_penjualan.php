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
                    <input type="button" name="btnTambah2" value="Tambah" class="btn btn-success" onclick="addData()" />
                    <input type="hidden" name="btnTambah" value="Tambah"/>
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
                  <label class="control-label">PPN</label>
                  <div class="controls">
                    <input type="number" name="ppn" id="ppn">
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
            <div style='display: none;' id="baranglist">
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
                    <div class="container control-group" style="margin-bottom:10px; margin-top:10px;">
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
                            <input onclick="cariBarang(this.value);" type="submit" name="btnCari" value="Cari" class="btn btn-info">
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
                      <table id="tablepop2Penjualan" class="table table-bordered display" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Nama Barang</th>
                            <th>Kode</th>
                            <th>Merk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tbody>
                      </table>
                    </div>
                    <!--<div class="container control-group" style="margin-bottom:10px; margin-top:10px">
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
                    </div>-->
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
<script src="<?php echo asset_url();?>js/datatables.min.js"></script>
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

  var dataBarangPopDipilih=[];

  var dataBarangSelected=[];
  /*{
    id_barang : x,
    id_supplier : x,
    id_type: x,
    harga: x,
    jumlah: x,
    deskripsi: x
  }
  */

  //SCRIPT MAIN TABLE

  $(document).ready(function() 
  {
    $('#mainTabelPenjualan').DataTable( {
      destroy: true,
      "scrollX": true,
      data: [ 
                [ 
                  '',
                  '<a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Tambah</a>',
                  '<a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Tambah</a>',
                  '',
                  '',
                  '',
                  '',
                  ''
               ]
              ],
      columns: [
                  { title: "Nomor" },
                  { title: "Nama Barang" },
                  { title: "Kode" },
                  { title: "Harga" },
                  { title: "Jumlah" },
                  { title: "Sub Total" },
                  { title: "Keterangan" },
                  { title: "Aksi" }
                ]
      });
  });

  function refreshMainTable()
  {

    console.log(dataBarangPopDipilih);
    var dataSet = [
              [ 
                  '',
                  '<a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Tambah</a>',
                  '<a href="#pop1TabelPenjualan" data-toggle="modal" class="btn btn-info btn-mini" role="button">Tambah</a>',
                  '',
                  '',
                  '',
                  '',
                  ''
               ]
    ];
    for (var i=0;i<dataBarangPopDipilih.length;i++)
    {
      var ii=i+1;
      var nama_barang = dataBarangPopDipilih[i][0][1]["nama"];
      var kode="";
      var id_barang = dataBarangPopDipilih[i][0][0]["id_barang"];
      //var nama_merk;
      
      var jumlah = 0;
      for (var x=0;x<dataBarangPopDipilih[i].length;x++)
      {
        //console.log(dataBarangPopDipilih[i][x][0]["kode"]);
        if(dataBarangPopDipilih[i].length>1 && x==0)
        {
          kode += dataBarangPopDipilih[i][x][0]["kode"]+"<br>";
          //nama_merk = dataBarangPopDipilih[i][x][0]["nama_merk"];
        }
        else
        {
          kode += dataBarangPopDipilih[i][x][0]["kode"];
        }

        if( dataBarangPopDipilih[i][x].length>2)
          jumlah += parseInt(dataBarangPopDipilih[i][x][2]["jumlah_barang"]);
      }

      var harga = $('#hargaTabelPenjualan'+id_barang).val();
      if(harga == null)
        harga=0;
      var subTotal = jumlah*harga;

      var temp =  [
                    ii, 
                    nama_barang,
                    kode,
                    '<input type="text" class="hargaMainTable" name="hargaTabelPenjualan'+id_barang+'" id="hargaTabelPenjualan'+id_barang+'" placeholder="Masukkan harga" value ="'+harga+'">',
                    '<input type="text" name="jumlahBarangTabelPenjualan'+id_barang+'" id="jumlahBarangTabelPenjualan'+id_barang+'" placeholder="Masukkan jumlah" value="'+jumlah+'" disabled>',
                    '<input type="text" name="subTotalTabelPenjualan'+id_barang+'" id="subTotalTabelPenjualan'+id_barang+'" placeholder="Subtotal" value="'+subTotal+'" disabled>',
                    '<textarea rows="4" cols="50" name="keteranganTabelPenjualan" id="keteranganTabelPenjualan" placeholder="Masukkan keterangan"></textarea>',
                    '<a href="#pop2TabelPenjualan" onclick="openPop2('+id_barang+')" data-toggle="modal" data-id="'+id_barang+'" title="Add this item" class="btn btn-warning btn-mini" role="button">Tambah Jumlah</a>'
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
        { title: "Keterangan" },
        { title: "Aksi" }
      ]
    });
  }

  //SCRIPT POP 1 TABLE

  function batalPop1()
  {
    dataBarangPopDipilih=dataBarangPilihan;
  }

  function updatePop1()
  {
    dataBarangPopDipilih=dataBarangPilihan;

    //refresh MAIN datatables
  }

  function selectPop1MerkPenjualan(id_merk)
  {
    document.getElementById('hiddenTempatPop1ListMerkPenjualan').value=id_merk;
  }

  function tambahBarangPop1(id)
  {
     var temp_kumpulan_data =[];

     var temp_id_barang =[];
     var temp_id_supplier =[];
     var temp_id_type =[];
     var temp_harga =0;
     var temp_jumlah =0;
     var temp_deskripsi ='';

    var cek=false;
    for(var x=0; x<dataBarangPopDipilih.length; x++)
    {
      //console.log(id+"|"+dataBarangPopDipilih[x]);
      if(id==dataBarangPopDipilih[x])
        cek=true;
    }

    if(!cek)
    {
      var link="detailBarang/get_detailBarangById/"+id;
      $(document).ready(function(){
        $.ajax({ 
          url: link
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
            //console.log(dataBarang);
            var temp =[];
            for (var x=0;x<dataBarang.length;x++)
            {
              if(dataBarang[x]["id"]==parseDataDetailBarang["dataDetailBarang"][i]["id_barang"])
              {
                temp_id_barang = dataBarang[x]['detail_barang'][0]['id_barang'];
                for (var y=0;y<dataBarang[x]['supplier_barang'].length;y++)
                {
                  temp_id_supplier.push(dataBarang[x]['supplier_barang'][y]['id_supplier']);
                }
                for (var y=0;y<dataBarang[x]['supplier_barang'].length;y++)
                {
                  temp_id_type.push(dataBarang[x]['supplier_barang'][y]['id_type']);
                }
                var object={id_barang:temp_id_barang, id_supplier:temp_id_supplier, id_type:temp_id_type, harga:temp_harga, jumlah:temp_jumlah, deskripsi:temp_deskripsi}
                dataBarangSelected.push(object);
                temp.push(parseDataDetailBarang["dataDetailBarang"][i]);
                temp.push(dataBarang[x]);

                console.log(dataBarangSelected);
              }
            }
            dataPerId.push(temp);
            text += ']';
          }
          text += '}';
          dataBarangPopDipilih.push(dataPerId);
          //console.log(dataPerId);
          //console.log(dataBarangPopDipilih);
          //console.log(dataBarangPopDipilih[0][0][0]["id"]);
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
    var index = dataBarangPopDipilih.indexOf(id);
    dataBarangPopDipilih.splice(index, 1);
    dataBarangSelected.splice(index, 1);
    
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
        //console.log(parsedDataBarang);
        var dataSet=[];

        for (var i=0;i<parsedDataBarang.length;i++)
        {
          var ii=i+1;
          var cek=false;
          for(var x=0; x<dataBarangPopDipilih.length; x++)
          {
            if(parsedDataBarang[i]["id"]==dataBarangPopDipilih[x][0][0]["id_barang"])
            {
              cek=true;
              //console.log(parsedDataBarang[i]["id"]);
              //console.log(dataBarangPopDipilih[x][0][0]["id_barang"]);
            }
          }

          if(cek)
            var temp=[ii,parsedDataBarang[i]["nama"],parsedDataBarang[i]["kode"],parsedDataBarang[i]["nama_merk"],'<a class="btn btn-danger btn-mini" onclick="hapusBarangPop1('+parsedDataBarang[i]["id_detail"]+')" name="btnHapus">Hapus</a>'];
          else
            var temp=[ii,parsedDataBarang[i]["nama"],parsedDataBarang[i]["kode"],parsedDataBarang[i]["nama_merk"],'<a class="btn btn-success btn-mini" onclick="tambahBarangPop1('+parsedDataBarang[i]["id_detail"]+')" name="btnTambah">Tambah</a>'];

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


  //SCRIPT POP 2 TABLE
  function openPop2(id_barang)
  {
    $(document).ready(function(){
      var dataSet = [];
      for (var i=0;i<dataBarangPopDipilih.length;i++)
      {
        var nama_barang = "";
        var nama_merk = "";
        var kode = "";
        var pilihSupplierPop2 = "";
        for (var x=0;x<dataBarangPopDipilih[i].length;x++)
        {
          if(dataBarangPopDipilih[i][x][0]["id_barang"]==id_barang)
          {
            var namaList = "selectPop2Supplier"+dataBarangPopDipilih[i][x][0]["id"];
            pilihSupplierPop2 = renderSelectOption(dataBarangPopDipilih[i][x][0]["id"],namaList,i,x);
            var ii=i+1;
            nama_barang = dataBarangPopDipilih[i][x][1]["nama"];
            nama_merk = dataBarangPopDipilih[i][x][0]["nama_merk"];
            kode = dataBarangPopDipilih[i][x][0]["kode"];
            var  dataSupplier = "";

            if(dataBarangPopDipilih[i][x].length>2)
            {
              for (var y=0;y<dataBarangPopDipilih[i][x].length;y++)
              {
                if(y>1)
                {
                  dataSupplier += '<br><input type="text" value="'+dataBarangPopDipilih[i][x][y]["nama_supplier"]+'" placeholder="" disabled><input type="text" value="'+dataBarangPopDipilih[i][x][y]["jumlah_barang"]+'" placeholder="" disabled>';
                }
              }
            }

            var temp =  [
                      ii, 
                      nama_barang,
                      kode,
                      nama_merk,
                      pilihSupplierPop2+'<input type="text" name= "jumlahBarangPop2'+dataBarangPopDipilih[i][x][0]["id"]+'" id="jumlahBarangPop'+dataBarangPopDipilih[i][x][0]["id"]+'" placeholder="Jumlah"></center>'+dataSupplier,
                      '<center><a href="#pop2TabelPenjualan" onclick="tambahSupplier('+dataBarangPopDipilih[i][x][0]["id"]+','+i+','+x+','+id_barang+')" class="btn btn-info btn-mini" role="button">Tambah</a></center>'
                    ];
            dataSet.push(temp);
          }
        }      
      }

      $('#tablepop2Penjualan').DataTable( {
            destroy: true,
            data: dataSet,
            columns: [
                { title: "Nomor" },
          { title: "Nama Barang" },
          { title: "Kode" },
          { title: "Merk" },
          { title: "Status" },
          { title: "Aksi" }
            ]
        });
    });
  }

  function renderSelectOption(id,nama_tempat,depan,belakang)
  {
    var selectOption = "";
    selectOption += "<select name='"+nama_tempat+"' id='"+nama_tempat+"' class='selectPop2Supplier'>;";
    selectOption += "<option >Pilih Supplier</option>"; 
    for(var i = 0 ; i < dataBarangPopDipilih[depan][belakang][1]["supplier_barang"].length; i++){
       selectOption += "<option  value="+dataBarangPopDipilih[depan][belakang][1]["supplier_barang"][0]["id_supplier"]+">"+dataBarangPopDipilih[depan][belakang][1]["supplier_barang"][0]["nama_supplier"]+"</option>";
    }
    selectOption +='</select>';
    return selectOption;
  }

  function tambahSupplier(id,depan,belakang,id_barang)
  {
    var id_supplier = $('#selectPop2Supplier'+id).val();
    var nama_supplier = $('#selectPop2Supplier'+id+' option:selected').text();
    var jumlah = $('#jumlahBarangPop'+id).val();

    if(id_supplier == 'Pilih Supplier')
      alert("Mohon pilih supplier barang");
    else
    {
      if(jumlah=="" || jumlah==null)
        alert("Mohon isi jumlah barang");

      var data = {id_supplier:id_supplier, nama_supplier:nama_supplier, jumlah_barang:jumlah};

      var cek = false;
      for (var x=0;x<dataBarangPopDipilih[depan][belakang].length;x++)
      {
        if(dataBarangPopDipilih[depan][belakang][x]["id_supplier"]==id_supplier)
        {
          cek = true;
        }
      }

      if(cek==true)
      {
        dataBarangPopDipilih[depan][belakang][2]["jumlah_barang"]=jumlah;
      }
      else
        dataBarangPopDipilih[depan][belakang].push(data);

      openPop2(id_barang);
    }
  }
  function addData(){

  }

  
  $('body').on("change paste keyup", '.hargaMainTable', function() {

    var nama = this.id;
    var id = nama.replace('hargaTabelPenjualan','');

    var harga = $('#hargaTabelPenjualan'+id).val();
    var jumlah = $('#jumlahBarangTabelPenjualan'+id).val();
    var subTotal = parseInt(jumlah)*parseInt(harga);

    $('#subTotalTabelPenjualan'+id).val(subTotal);
  });
</script>
</body>
</html>