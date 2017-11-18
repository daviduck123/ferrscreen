<div id="content">
  <script>
    var kembars=[];
    var types=[];
  </script>
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url();?>dashboard" title="Go to Home" class="tip-bottom">
        <i class="icon-dashbard"></i> 
        Dashboard
      </a>
      <a href="#" class="">
        Master Data
      </a>
      <a href="<?php echo base_url();?>barang" class="">
        Barang
      </a>
      <a href="#" class="current">
        Tambah Barang
      </a>
    </div>
    <h1>Tambah Barang</h1>
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
            <h5>Tambah Barang</h5>
          </div>
          <div class="widget-content nopadding">
            <?php 
            echo form_open("barang/prosesTambahBarang",  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
           <!--  <form class="form-horizontal" method="post" action="<?php echo base_url();?>barang/prosesTambahBarang" name="basic_validate" id="basic_validate" novalidate="novalidate"> -->
            <div class="control-group">
            <label class="control-label">Kode</label>
              <div class="controls">
                <input type="text" oncut="onchangeKode(this.value)" onpaste="onchangeKode(this.value)" onkeyup="onchangeKode(this.value)" onmouseup="onchangeKode(this.value)" onchange="onchangeKode(this.value)" name="kodeBarang" id="kodeBarang">
              </div>
              <label class="control-label">Nama Barang</label>
              <div class="controls">
                <input type="text" name="namaBarang" id="namaBarang">
              </div>
              <label class="control-label">Min Stok</label>
              <div class="controls">
                <input type="number" name="minStok" id="minStok">
              </div>
              <label class="control-label"> </label>
              <div class="controls">
                <button class="btn btn-success btn-mini" data-backdrop="static" data-toggle="modal" data-keyboard="false" data-target="#kembarModal"
                data-id=""
                data-title="Barang Sama"
                onclick="modalKembar()"
                id="btnKembarModal">Barang Sama
                </button>
              </div>
              <label class="control-label">Pilih Merk Barang</label>
              <div class="controls">
                <select style class="form-control col-xs-3" name="pilihMerkBarang" id="pilihMerkBarang">
                  <?php 
                  if(isset($dataMerk))
                  {
                    foreach ($dataMerk as $merk) 
                    {
                      echo "<option value='".$merk[id]."'>".$merk[nama]."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <label class="control-label">Harga Normal</label>
              <div class="controls">
                <input type="number" name="hargaNormal" id="hargaNormal">
              </div>
              <label class="control-label">Deskripsi Barang</label>
              <div class="controls">
                <textarea rows="4" cols="50" name="deskripsiNormal"></textarea>
              </div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <label><input type="checkbox" value="low" name="checkLow" id="checkLow">Low?</label>
              </div>
              <div id="tempatLow"></div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <label><input type="checkbox" value="premium" name="checkPremium" id="checkPremium">Premium?</label>
              </div>
              <div id="tempatPremium"></div>
              <input type="hidden" value="" id="types" />
              <input type="hidden" value="" id="similarBarang" />
            </div>
              <div class="form-actions">
                <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--modal Kembar data-->
<div class="modal fade"  id="kembarModal" style="width:50%; left:30%; " role="dialog" aria-labelledby="Barang Kembar" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang Kembar</h4>
            </div>

            <div class = "modal-body">
                <div class="container-fluid">
                  <div class="widget-box">
                    <div class="widget-title"> 
                      <span class="icon"><i class="icon-th"></i></span>
                      <span class="icon"><b>Masukkan Barang Kembar</b></span>
                    </div>
                    <div id="divBarangKembar"></div>
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
<script>
  $(document).ready(function(){

      $('#checkLow').change(function() 
      {
        if(this.checked) 
        {
          var valKode = "L"+document.getElementById("kodeBarang").value
          var html='<label class="control-label">Kode</label>'+
                 '<div class="controls">'+
                    '<input type="text" name="kodeBarangLow" id="kodeBarangLow" value="'+valKode+'" disabled>'+
                  '</div>'+
                  '<label class="control-label">Pilih Merk Barang</label>'+
                  '<div class="controls">'+
                    '<select style class="form-control col-xs-3" name="pilihMerkBarangLow" id="pilihMerkBarangLow">'+
                    <?php 
                    if(isset($dataMerk))
                    {
                      foreach ($dataMerk as $merk) 
                      {
                        echo "'<option value=".'"'.$merk["id"].'"'.">".$merk["nama"]."</option>'+";
                      }
                    }
                    ?>
                    '</select>'+
                  '</div>'+
                  '<label class="control-label">Harga Low</label>'+
                  '<div class="controls">'+
                    '<input type="number" name="hargaLow" id="hargaLow">'+
                  '</div>'+
                  '<label class="control-label">Deskripsi Barang</label>'+
                  '<div class="controls">'+
                    '<textarea rows="4" cols="50" name="deskripsiLow"></textarea>'+
                  '</div>';
          $("#tempatLow").html(html);
        } 
        else 
        {
          $("#tempatLow").html("");
        } 
      });

      $('#checkPremium').change(function() 
      {
        if(this.checked) 
        {
          var valKode = "L"+document.getElementById("kodeBarang").value
          var html='<label class="control-label">Kode</label>'+
                 '<div class="controls">'+
                    '<input type="text" name="kodeBarangPremium" id="kodeBarangPremium" value="'+valKode+'" disabled>'+
                  '</div>'+
                  '<label class="control-label">Pilih Merk Barang</label>'+
                  '<div class="controls">'+
                    '<select style class="form-control col-xs-3" name="pilihMerkBarangPremium" id="pilihMerkBarangPremium">'+
                    <?php 
                    if(isset($dataMerk))
                    {
                      foreach ($dataMerk as $merk) 
                      {
                        echo "'<option value=".'"'.$merk["id"].'"'.">".$merk["nama"]."</option>'+";
                      }
                    }
                    ?>
                    '</select>'+
                  '</div>'+
                  '<label class="control-label">Harga Premium</label>'+
                  '<div class="controls">'+
                    '<input type="number" name="hargaPremium" id="hargaPremium">'+
                  '</div>'+
                  '<label class="control-label">Deskripsi Barang</label>'+
                  '<div class="controls">'+
                    '<textarea rows="4" cols="50" name="deskripsiPremium"></textarea>'+
                  '</div>';
          $("#tempatPremium").html(html);
        } 
        else 
        {
          $("#tempatPremium").html("");
        } 
      });

  });

    function onchangeKode(kode)
    {
      var elementLow = document.getElementById('kodeBarangLow');
      if (elementLow === null)
      {
        
      }
      else
      {
        document.getElementById("kodeBarangLow").value = "L"+kode;
      }

      var elementPremium = document.getElementById('kodeBarangPremium');
      if (elementPremium === null)
      {
        
      }
      else
      {
        document.getElementById("kodeBarangPremium").value = "L"+kode;
      }
    }

    function modalKembar()
    {
        var title = $("#btnKembarModal").data('title');
        var id = $("#btnKembarModal").data('id');
      
        //document.getElementById("id").innerHTML = id;

        var dataBarang = <?php echo json_encode($dataBarang) ?>;
        var dataType = <?php echo json_encode($dataType) ?>;

        console.log(id);
        console.log(title);
        console.log(dataBarang);
        console.log(dataType);

        //For Opening Modal
        //processDetailModal(dataBarang, id);
        processBarangSama(dataBarang, dataType);

        $(".modal-body #id").val(id);
        $(".modal-title").text(title);
    }

    function processBarangSama(dataBarang, dataType){
      var id=0;
        var typeList = "";
        for(var i = 0 ; i < dataType.length; i++){
          typeList += "<option  value="+dataType[i]['id']+">"+dataType[i]['nama']+"</option>";
        }

        var barangList = "";
        for(var i = 0 ; i < dataBarang.length; i++){
          barangList += "<option  value="+dataBarang[i]['id']+">"+dataBarang[i]['nama']+"</option>";
        }

        var dataKembar = "";
        for(var i = 0 ; i < kembars.length; i++){
          dataKembar += '<tr>';
          dataKembar += '<td><input type="text" value="'+types[i]['nama']+'" disabled></td>';
          dataKembar += '<td><input type="text" value="'+kembars[i]['nama']+'" disabled></td>';
          dataKembar += '<td><button onclick="prosesHapusKembar(this.id)" name="btnHapus" id="'+i+'" class="btn btn-danger btn-mini">hapus</button></td>';
          dataKembar += '</tr>';
        }

        //Buat tampilan untuk Edit
        var html = "<table class='table table-bordered' id='tableBarangSama'>";
        html    += "  <thead>"
        html    += "    <tr>";
        html    += "      <th>Type</th>";
        html    += "      <th>Barang</th>";
        html    += "      <th></th>";
        html    += "    </tr>";
        html    += "  </thead>"
        html    += "  <tbody>"
        html += "<tr>";
        html += "<td>";
        html += "<select class='col-xs-3' name='pilihTypeSama' id='pilihTypeSama'>;";
        html += typeList;
        html +='</select>';
        html+="</td>";
        html += "<td>";
        html += "<select class='col-xs-3' name='pilihBarangSama' id='pilihBarangSama'>;";
        html += barangList;
        html +='</select>';
        html+="</td>";
        html += '<td><button type="submit" onclick="prosesTambahKembar()" name="btnTambah" id="" class="btn btn-success btn-mini">Tambah</button></td>';
        html += "</tr>";
        html+=dataKembar;
        /*
        for(var i = 0 ; i < dataType.length; i++){
          if(Number(dataType[i]['id']) === Number(id)){

            var supplier_barang = dataType[i]['supplier_barang'];
            for(var j = 0 ; j < supplier_barang.length; j++){
              html += "<tr>";
              html += "<td><input type='text' value='"+  supplier_barang[j]['nama_supplier']  +"' disabled/></td>";
              html += "<td><input type='number' value='"+  supplier_barang[j]['stok']  +"' id='stok-"+supplier_barang[j]['id_supplier']+"-"+id+"'/></td>";
              html += '<td><a class="btn btn-warning btn-mini" onclick="editDetailBarang('+supplier_barang[j]['id_supplier']+','+id+')" name="btnEdit">Update</a> ';
              html += '<a class="btn btn-danger btn-mini" onclick="deleteDetailBarang('+supplier_barang[j]['id_supplier']+','+id+')" name="btnHapus">Hapus</a></td>';
              html += "</tr>";
            }
          }
        }
        */
        html    += "  </tbody>"
        html    += "</table>"

        $("#divBarangKembar").html(html);
        /*
        $('#tableUpdate').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "sDom": '<""l>t<"F"fp>'
        });
        */
    }
    function prosesTambahKembar(){
      var dataBarang = <?php echo json_encode($dataBarang) ?>;
      var dataType = <?php echo json_encode($dataType) ?>;

      var e = document.getElementById("pilihTypeSama");
      var f = document.getElementById("pilihBarangSama");
      if($('#pilihTypeSama').has('option').length > 0 && $('#pilihBarangSama').has('option').length > 0) 
      {
        var id_type = e.options[e.selectedIndex].value;
        var id_barang = f.options[f.selectedIndex].value;

        for(var i = 0 ; i < dataBarang.length; i++){
          if(Number(dataBarang[i]["id"])==Number(id_barang))
            id_barang=i;
        }

        for(var i = 0 ; i < dataType.length; i++){
          if(Number(dataType[i]["id"])==Number(id_type))
            id_type=i;
        }

        //check apakah sudah pernah dimasukkan
        var check=false;
        for(var i = 0 ; i < kembars.length; i++){
          if(kembars[i]['id']==dataBarang[id_barang]['id'] && types[i]['id']==dataType[id_type]['id'] )
            check=true;
        }

        if(check==false)
        {
          kembars.push(dataBarang[id_barang]);
          types.push(dataType[id_type]);

        document.getElementById("types").value=JSON.stringify(types);
        document.getElementById("similarBarang").value=JSON.stringify(kembars);
        
        }

        modalKembar();
      }
    }

    function prosesHapusKembar(id){
      kembars.splice(id, 1);
      types.splice(id, 1);

      document.getElementById("types").value=JSON.stringify(types);
      document.getElementById("similarBarang").value=JSON.stringify(kembars);

      modalKembar();
    }
</script>
</body>
</html>