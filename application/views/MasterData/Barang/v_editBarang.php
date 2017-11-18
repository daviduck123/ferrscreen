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
      <a href="<?php echo base_url();?>barang" class="">
        Barang
      </a>
      <a href="#" class="current">
        Edit Barang
      </a>
    </div>
    <h1>Edit Barang</h1>
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
            <h5>Edit Barang</h5>
          </div>
          <div class="widget-content nopadding">
            <?php 
            echo form_open("barang/prosesUpdateBarang/".$idBarang,  
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
           <?php
           //print_r($barangSelected[0]["detail_barang"]);
           //exit();
              $isLow=false;
              $isPremium=false;
              $kode=false;
              $hargaNormal=0;
              $deskripsiNormal="";
              $hargaLow=0;
              $deskripsiLow="";
              $hargaPremium=0;
              $deskripsiPremium="";
              if(count($barangSelected[0]["detail_barang"]) > 0)
              {
                foreach($barangSelected[0]["detail_barang"] as $data)
                {
                  if($data["type"]=="L")
                  {
                    $isLow=true;
                    $hargaLow=$data["harga"];
                    $deskripsiLow=$data["deskripsi"];
                  }
                  else if($data["type"]=="P")
                  {
                    $isPremium=true;
                    $hargaPremium=$data["harga"];
                    $deskripsiPremium=$data["deskripsi"];
                  }
                  else
                  {
                    $kode=$data["kode"];
                    $hargaNormal=$data["harga"];
                    $deskripsiNormal=$data["deskripsi"];
                  }
                }
              }
           ?>
            <div class="control-group">
            <label class="control-label">Kode</label>
              <div class="controls">
                <input type="text" oncut="onchangeKode(this.value)" onpaste="onchangeKode(this.value)" onkeyup="onchangeKode(this.value)" onmouseup="onchangeKode(this.value)" onchange="onchangeKode(this.value)" name="kodeBarang" id="kodeBarang" value="<?php echo $kode; ?>">
              </div>
              <label class="control-label">Nama Barang</label>
              <div class="controls">
                <input type="text" name="namaBarang" id="namaBarang" value="<?php echo $barangSelected[0]["nama"] ?>">
              </div>
              <label class="control-label">Min Stok</label>
              <div class="controls">
                <input type="number" name="minStok" id="minStok" value="<?php echo $barangSelected[0]["min_stok"] ?>">
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
                      $cek=0;
                      if(count($barangSelected[0]["detail_barang"]) > 0)
                      {
                        foreach($barangSelected[0]["detail_barang"] as $data)
                        {
                          if($merk['id']==$data['id_merk'] && $data['type']=="N" )
                            $cek=1;
                        }
                      }
                      if($cek==1)
                      {
                        ?>
                          <option value="<?php echo $merk['id']; ?>" selected><?php echo $merk['nama']; ?></option>
                        <?php
                      }
                      else
                      {
                        ?>
                          <option value="<?php echo $merk['id']; ?>"><?php echo $merk['nama']; ?></option>
                        <?php
                      }
                    }
                  }
                  ?>
                </select>
              </div>
              <label class="control-label">Harga Normal</label>
              <div class="controls">
                <input type="number" name="hargaNormal" id="hargaNormal" value="<?php echo $hargaNormal ?>">
              </div>
              <label class="control-label">Deskripsi Barang</label>
              <div class="controls">
                <textarea rows="4" cols="50" name="deskripsiNormal"><?php echo $deskripsiNormal ?></textarea>
              </div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <?php
                  if($isLow==false)
                    echo '<label><input type="checkbox" value="low" name="checkLow" id="checkLow">Low?</label>';
                  else
                    echo '<label><input type="checkbox" value="low" name="checkLow" id="checkLow" checked="checked">Low?</label>';
                ?>
              </div>
              <div id="tempatLow">
                <?php
                if($isLow==true)
                {
                  $html='<label class="control-label">Kode</label>
                          <div class="controls">
                            <input type="text" name="kodeBarangLow" id="kodeBarangLow" value="L'.$kode.'" disabled>
                          </div>
                          <label class="control-label">Pilih Merk Barang</label>
                          <div class="controls">
                            <select style class="form-control col-xs-3" name="pilihMerkBarangLow" id="pilihMerkBarangLow">';
                            if(isset($dataMerk))
                            {
                              foreach ($dataMerk as $merk) 
                              {
                                $cek=0;
                                if(count($barangSelected[0]["detail_barang"]) > 0)
                                {
                                  foreach($barangSelected[0]["detail_barang"] as $data)
                                  {
                                    if($merk['id']==$data['id_merk'] && $data['type']=="L" )
                                      $cek=1;
                                  }
                                }
                                if($cek==1)
                                {
                                  $html.='<option value="'.$merk['id'].'" selected>'.$merk['nama'].'</option>';
                                }
                                else
                                {
                                  $html.='<option value="'.$merk['id'].'" >'.$merk['nama'].'</option>';
                                }
                              }
                            }
                  $html.='  </select>
                          </div>
                          <label class="control-label">Harga Low</label>
                          <div class="controls">
                            <input type="number" name="hargaLow" id="hargaLow" value="'.$hargaLow.'">
                          </div>
                          <label class="control-label">Deskripsi Barang</label>
                          <div class="controls">
                            <textarea rows="4" cols="50" name="deskripsiLow">'.$deskripsiLow.'</textarea>
                          </div>';

                  echo $html;
                }
                ?>
              </div>
              <label class="control-label"> </label>
              <div class="checkbox controls">
                <?php
                  if($isPremium==false)
                    echo '<label><input type="checkbox" value="premium" name="checkPremium" id="checkPremium">Premium?</label>';
                  else
                    echo '<label><input type="checkbox" value="premium" name="checkPremium" id="checkPremium" checked="checked">Premium?</label>';
                ?>
              </div>
              <div id="tempatPremium">
                <?php
                if($isPremium==true)
                {
                  $html='<label class="control-label">Kode</label>
                          <div class="controls">
                            <input type="text" name="kodeBarangPremium" id="kodeBarangPremium" value="P'.$kode.'" disabled>
                          </div>
                          <label class="control-label">Pilih Merk Barang</label>
                          <div class="controls">
                            <select style class="form-control col-xs-3" name="pilihMerkBarangPremium" id="pilihMerkBarangPremium">';
                            if(isset($dataMerk))
                            {
                              foreach ($dataMerk as $merk) 
                              {
                                $cek=0;
                                if(count($barangSelected[0]["detail_barang"]) > 0)
                                {
                                  foreach($barangSelected[0]["detail_barang"] as $data)
                                  {
                                    if($merk['id']==$data['id_merk'] && $data['type']=="L" )
                                      $cek=1;
                                  }
                                }
                                if($cek==1)
                                {
                                  $html.='<option value="'.$merk['id'].'" selected>'.$merk['nama'].'</option>';
                                }
                                else
                                {
                                  $html.='<option value="'.$merk['id'].'" >'.$merk['nama'].'</option>';
                                }
                              }
                            }
                  $html.='  </select>
                          </div>
                          <label class="control-label">Harga Premium</label>
                          <div class="controls">
                            <input type="number" name="hargaPremium" id="hargaPremium" value="'.$hargaPremium.'">
                          </div>
                          <label class="control-label">Deskripsi Barang</label>
                          <div class="controls">
                            <textarea rows="4" cols="50" name="deskripsiPremium">'.$deskripsiPremium.'</textarea>
                          </div>';

                  echo $html;
                }
                ?>
              </div>
              <div id='hidden'>
              </div>
              <input type="hidden" value="" id="types" name="types"/>
              <input type="hidden" value="" id="similarBarang" name="similarBarang"/>
            </div>
              <div class="form-actions">
                <a href="<?php echo base_url();?>barang/" class="btn btn-info" role="button">Batal</a>
                <input type="submit" name="btnTambah" value="Ubah" class="btn btn-success"/>
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
  var kembars=[];
    var types=[];

    var barangSelected = <?php echo json_encode($barangSelected) ?>;
    for(var i = 0 ; i < barangSelected[0]['barang_kembar'].length; i++){

      var id_barang = barangSelected[0]['barang_kembar'][i]['id_barangKembar'];
      var id_type = barangSelected[0]['barang_kembar'][i]['id_type'];
      kembars.push(id_barang);
      types.push(id_type);
      
      var text="";
      text += '<input type="hidden" value="'+ id_type +'" id="types-'+ id_type +'" name="types[]"/>';
      text += '<input type="hidden" value="'+ id_barang +'" id="similarBarang-'+ id_barang +'" name="similarBarang[]"/>';
      $("#hidden").append(text);
    }
  $(document).ready(function(){
    $('#checkLow').change(function() {
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

  });

  $('#checkPremium').change(function() 
      {
        if(this.checked) 
        {
          var valKode = "P"+document.getElementById("kodeBarang").value
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
        document.getElementById("kodeBarangPremium").value = "P"+kode;
      }
    }

    function modalKembar()
    {
        var title = $("#btnKembarModal").data('title');
        var id = $("#btnKembarModal").data('id');
      

        var dataBarang = <?php echo json_encode($dataBarang) ?>;
        var dataType = <?php echo json_encode($dataType) ?>;

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

          for(var j = 0 ; j < dataType.length; j++){
            if(dataType[j]['id']==types[i])
              dataKembar += '<td><input type="text" value="'+dataType[j]['nama']+'" disabled></td>';
          }

          for(var j = 0 ; j < dataBarang.length; j++){
            if(dataBarang[j]['id']==kembars[i])
            dataKembar += '<td><input type="text" value="'+dataBarang[j]['nama']+'" disabled></td>';
          }
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
    }

    function prosesTambahKembar(){
      var e = document.getElementById("pilihTypeSama");
      var f = document.getElementById("pilihBarangSama");
      if($('#pilihTypeSama').has('option').length > 0 && $('#pilihBarangSama').has('option').length > 0) 
      {
        var id_type = e.options[e.selectedIndex].value;
        var id_barang = f.options[f.selectedIndex].value;

        //check apakah sudah pernah dimasukkan
        var check=false;
        for(var i = 0 ; i < kembars.length; i++){
          if(kembars[i]==id_barang && types[i]==id_type)
            check=true;
        }

        if(check==false)
        {
          kembars.push(id_barang);
          types.push(id_type);
          var text="";
          text += '<input type="hidden" value="'+ id_type +'" id="types-'+ id_type +'" name="types[]"/>';
          text += '<input type="hidden" value="'+ id_barang +'" id="similarBarang-'+ id_barang +'" name="similarBarang[]"/>';
          $("#hidden").append(text);
        
        }

        modalKembar();
      }
    }

    function prosesHapusKembar(id){
       var id_barang = kembars.splice(id, 1);
      var id_type = types.splice(id, 1);

      $("#types-"+id_type).remove();
      $("#similarBarang-"+id_barang).remove();

      modalKembar();
    }

</script>
</body>
</html>