<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashboard"></i> 
        Dashboard
      </a>
      <a href="#" class="">
        Master Data
      </a>
      <a href="#" class="current">
        Barang
      </a>
    </div>
    <h1>Barang</h1>
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
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> 
          <a href="<?php echo base_url();?>barang/tambahBarang"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Barang
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
            <span class="icon"><b>List Barang</b></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Barang</th>
                  <th>Min Stok</th>
                  <th>Stok Tersedia</th>
                  <th>Kode</th>
                  <th>Nama Merk</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(isset($dataBarang))
                {
                    $number=1;
                    foreach ($dataBarang as $barang) 
                    {
                        $btn = false;
                        ?>
                        <tr class="gradeX">
                          <td style = "vertical-align: middle;"><?php echo $number ?></td>
                          <td style = "vertical-align: middle;"><?php echo $barang['nama'] ?></td>
                          <td style = "vertical-align: middle;"><?php echo $barang['min_stok'] ?></td>
                          <td style = "vertical-align: middle;">
                            <?php echo $barang['total_stok']; ?>
                            <button style='float:right; margin-left: 3px;' class="btn btn-info btn-mini" data-toggle="modal" data-target="#detailModal"
                              data-id="<?php echo $barang['id']; ?>"
                              data-title="Detail Stok"
                              onclick="OpenModal(<?php echo $number; ?>)"
                              id="btnModal<?php echo $number; ?>"
                              >Detail Stok</button>
                            <button style='float:right; margin-left: 3px;' class="btn btn-success btn-mini" data-backdrop="static" data-toggle="modal" data-keyboard="false" data-target="#updateModal"
                              data-id="<?php echo $barang['id']; ?>"
                              data-title="Update Stok"
                              onclick="OpenModal(<?php echo $number; ?>)"
                              id="btnModal<?php echo $number; ?>"
                              >Update Stok</button>
                          </td>
                          <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['kode'] ;?></br>
                             <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['nama_merk']; ?></br>
                           <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['harga']; ?></br>
                            <?php } ?>
                          </td>
                           <td style = "vertical-align: middle;">
                             <?php foreach($barang["detail_barang"] as $detail){ ?>
                                <?php echo $detail['deskripsi']; ?></br>
                            <?php } ?>
                          </td>
                          <td style = "vertical-align: middle;">
                            <a href="<?php echo base_url();?>barang/editBarang/<?php echo $barang["id"] ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
                            <a href="#deleteData<?php echo $barang["id"] ?>" data-toggle="modal" class="btn btn-danger btn-mini" role="button">Hapus</a>

                                    <div id="deleteData<?php echo $barang["id"] ?>" class="modal hide" aria-hidden="true" style="display: none;">
                                      <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                          <h3>Hapus Data</h3>
                                      </div>
                                      <div class="modal-body">
                                        <p>Apakah kamu ingin menghapus data <?php echo $barang["nama"] ?>?</p>
                                      </div>
                                      <div class="modal-footer"> 
                                        <a class="btn btn-primary" href="<?php echo base_url();?>barang/hapusBarang/<?php echo $barang["id"] ?>" name="btnHapus">Hapus</a> 
                                        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                                      </div>
                                    </div>
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
  </div>
</div>
<!--modal Detail data-->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Nota</h4>
            </div>

            <div class = "modal-body">
                <!-- Di sini nanti buat table untuk liat Stok yang di dapat dari Stok-Supplier -->
                <!-- Data tergantung dari Supplier Barang, klo ada array isinya, maka ada isinya -->
                <div id="divDetailBarang">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-github" data-dismiss="modal">Kembali</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->
<!--modal Update data-->
<div class="modal fade"  id="updateModal" style="width:50%; left:30%; " role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Stok</h4>
            </div>

            <div class = "modal-body">
              <!--
                <div class="container-fluid">
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                      <h5>Tambah Stok</h5>
                    </div>
                    <!--
                    <div class="widget-content nopadding">
                      <?php echo form_open("barang/prosesTambahDetailBarang",  
                        array(
                          'name' => 'basic_validate', 
                          'id' => 'basic_validate',
                          'novalidate' => 'novalidate',
                          'class' => "form-horizontal"
                        )
                      );   
                      ?>
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Supplier</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="taskDesc">
                              <div id="divUpdateAddIdBarang"></div>
                              <div id="divUpdateAddBarang">
                              </div>
                            </td>
                            <td class="taskStatus">
                               <input type="number" name="stok"/>
                            </td>
                            <td class="taskStatus">
                               <input type="number" name="harga"/>
                            </td>
                            <td class="taskOptions">
                              <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success btn-mini"/>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <?php  echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <!-- Di sini nanti buat table untuk update Stok yang di dapat dari Stok-Supplier -->
                <!-- Data tergantung dari Supplier Barang, klo ada array isinya, maka ada isinya -->
                <!-- Klo ga ada isinya, ada inputan, Combobox supplier, Input Box Stok, button Hapus -->
                <div class="container-fluid">
                  <div class="widget-box">
                    <div class="widget-title"> 
                      <span class="icon"><i class="icon-th"></i></span>
                      <span class="icon"><b>List Stok</b></span>
                    </div>
                    <div id="divUpdateBarang"></div>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-github" data-dismiss="modal">Kembali</button>
                <!--<button class="btn btn-success" name="btn_submit">Update</button>-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->
<!--modal delete data-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('barang/delete_barang'); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Nota</h4>
            </div>

            <div class = "modal-body">
                <input type="hidden" id="id" name="id">
                <h3>Apakah anda yakin?</h3>
                <span>Aksi penghapusan tidak bisa dikembalikan/bersifat permanen</span>

            </div>
            <div class="modal-footer">
                <button class="btn btn-github" data-dismiss="modal">Kembali</button>
                <button class="btn btn-danger" name="btn_submit">Hapus</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-->

<!-- Modal Tambah Similar-->
<div class="modal hide" id="modalSimilar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Tambah Similar Merk</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
              <label class="control-label">Pilih Merk</label>
              <div class="controls">
                <select multiple >
                  <option>First option</option>
                  <option selected>Second option</option>
                  <option>Third option</option>
                  <option>Fourth option</option>
                  <option>Fifth option</option>
                  <option>Sixth option</option>
                  <option>Seventh option</option>
                  <option>Eighth option</option>
                </select>
              </div>
        </div>
    </div>
    <div class="modal-footer"> 
      <a href="#" class="btn" data-dismiss="modal">Tutup</a>
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
<script type="text/javascript" charset="utf-8">
    function OpenModal(angka)
    {
        var title = $("#btnModal"+angka).data('title');
        var id = $("#btnModal" + angka).data('id');
      
        document.getElementById("id").innerHTML = id;

        var dataBarang = <?php echo json_encode($dataBarang) ?>;       

        //For Opening Modal
        processDetailModal(dataBarang, id);
        processUpdateModal(dataBarang, id);

        $(".modal-body #id").val(id);
        $(".modal-title").text(title);
    }

    function processDetailModal(dataBarang, id){
        var html = "<table class='table table-bordered' id='tableDetail'>";
        html    += "  <thead>"
        html    += "    <tr>";
        html    += "      <th>Supplier</th>";
        html    += "      <th>Stok</th>";
        html    += "    </tr>";
        html    += "  </thead>"
        html    += "  <tbody>"
        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]['id']) === Number(id)){

            var supplier_barang = dataBarang[i]['supplier_barang'];
            for(var j = 0 ; j < supplier_barang.length; j++){
              html += "<tr>";
              html += "<td>"+ supplier_barang[j]['nama_supplier'] +"</td>";
              html += "<td>"+ supplier_barang[j]['stok'] +"</td>";
              html += "</tr>";
            }
          }
        }
        html    += "  </tbody>"
        html    += "</table>"

        $("#divDetailBarang").html(html);

        $('#tableDetail').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "sDom": '<""l>t<"F"fp>'
        });
    }

    function processUpdateModal(dataBarang, id){

        var dataSupplier = <?php echo json_encode($dataSupplier) ?>;
        //Buat tampilan untuk Edit
        var html = "<table class='table table-bordered' id='tableUpdate'>";
        html    += "  <thead>"
        html    += "    <tr>";
        html    += "      <th>Supplier</th>";
        html    += "      <th>Stok</th>";
        html    += "      <th></th>";
        html    += "    </tr>";
        html    += "  </thead>"
        html    += "  <tbody>"
        html += "<tr>";
        html += "<td>";
        html += "<select class='col-xs-3' name='pilihSupplier' id='pilihSupplier'>;";

        for(var x = 0 ; x < dataBarang.length; x++)
        {
          if(Number(dataBarang[x]['id']) === Number(id))
          {
            console.log(dataSupplier);
            console.log(dataBarang[x]['id']);
            console.log(dataBarang[x]);

            if(dataBarang[x]['supplier_barang'].length>0)
            {
              for(var j = 0 ; j < dataBarang[x]['supplier_barang'].length; j++)
              {
                var check=0;
                var temp=0;
                for(var i = 0 ; i < dataSupplier.length; i++)
                {
                  if (dataSupplier[i]["id"]==dataBarang[x]['supplier_barang'][j]['id_supplier'])
                  {
                  }
                  else
                  {
                    html += "<option  value="+dataSupplier[i]['id']+">"+dataSupplier[i]['nama']+"</option>";
                  }
                }
                if(check==1)
                {
                  console.log(temp);
                  html += "<option  value="+dataSupplier[temp]['id']+">"+dataSupplier[temp]['nama']+"</option>";
                }
              }
            }
            else
            {
              for(var i = 0 ; i < dataSupplier.length; i++)
                {
                  html += "<option  value="+dataSupplier[i]['id']+">"+dataSupplier[i]['nama']+"</option>";
                }
            }
          }
        }

        html +='</select>';
        html+="</td>";
        html += "<td><input type='number' id='tambahStok'/></td>";

        html += '<td><button type="submit" onclick="tambahDetail(this.id)" name="btnTambah" id="'+id+'" class="btn btn-success btn-mini">Tambah</button></td>';
        html += "</tr>";
        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]['id']) === Number(id)){

            var supplier_barang = dataBarang[i]['supplier_barang'];
            for(var j = 0 ; j < supplier_barang.length; j++){
              html += "<tr>";
              html += "<td><input type='text' value='"+  supplier_barang[j]['nama_supplier']  +"'/></td>";
              html += "<td><input type='number' value='"+  supplier_barang[j]['stok']  +"'/></td>";
              html += '<td><a class="btn btn-warning btn-mini" href="<?php echo base_url(); ?>barang/editDetailBarang/'+supplier_barang[j]['id_supplier']+'/'+id+'" name="btnEdit">Edit</a>';
              html += '<a class="btn btn-danger btn-mini" href="<?php echo base_url(); ?>barang/hapusDetailBarang/'+supplier_barang[j]['id_supplier']+'/'+id+'" name="btnHapus">Hapus</a></td>';
              html += "</tr>";
            }
          }
        }
        html    += "  </tbody>"
        html    += "</table>"

        $("#divUpdateBarang").html(html);

        $('#tableUpdate').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "sDom": '<""l>t<"F"fp>'
        });
        /*
        var html ='<select class="col-xs-3" name="pilihSupplier" id="pilihSupplier">;'
        <?php 
          if(isset($dataSupplier))
          {
            foreach ($dataSupplier as $supplier) 
            {
              echo "html+="."'"."<option  value=".'"'.$supplier["id"].'"'.">".$supplier["nama"]."</option>"."';";
            }
          }
        ?>
        html +='</select>';
        $("#divUpdateAddBarang").html(html);

        var html = "<input type='hidden' name='id_barang' value='"+id+"'>";
        $("#divUpdateAddIdBarang").html(html);
        */

    }

    function tambahDetail(id)
    {
      var stok = document.getElementById("tambahStok").value;
      if(stok!="")
      {
        var e = document.getElementById("pilihSupplier");
        if( $('#pilihSupplier').has('option').length > 0 ) 
        {
          var id_supplier = e.options[e.selectedIndex].value;

          var dataPost={
              "btnTambah": "btnTambah", 
                    "id_supplier" : id_supplier,
                    "id_barang": id, 
                    "stok": stok, 
                    "harga" : 100
          };
          console.log(dataPost);
          $.ajax({
            url: "<?php echo base_url(); ?>barang/prosesTambahDetailBarang",
            type: 'POST',
            data: dataPost,
            dataType: 'jsonp',
            contentType: "application/x-www-form-urlencoded",
            success: function (response) {
              alert(response.status);
            },
            error: function(xhr, status, error) {
              alert(xhr.responseText);
            }
         });
        }
      }
      else
      {
        alert("Mohon isi jumlah stok");
      }
    }
</script>
</body>
</html>