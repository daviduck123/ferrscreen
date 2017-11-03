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
           //print_r($dataMerk);
           //exit();
              $isLow=false;
              $kode=false;
              $hargaNormal=0;
              $deskripsiNormal="";
              $hargaLow=0;
              $deskripsiLow="";
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
              <label class="control-label">Barang Sama</label>
              <div class="controls">
                <select multiple="multiple" name="similarBarang[]">
                  <?php 
                  if(count($dataBarang) > 0)
                  {
                    foreach ($dataBarang as $barang) 
                    {
                      $cek=0;
                      if(count($barangSelected[0]["detail_barang"]) > 0)
                      {
                        foreach($barangSelected[0]["detail_barang"] as $data)
                        {
                          if($barang['id']==$data['id_barang'])
                            $cek=1;
                        }
                      }
                      if($cek==1)
                      {

                      }
                      else
                      {
                        $checked = false;
                        foreach($barangSelected[0]["barang_kembar"] as $kembar){
                          if($barang['id'] == $kembar['id_barangKembar']){
                            $checked = true;
                            break;
                          }
                        }
                        if($checked == true){
                          ?>
                          <option value="<?php echo $barang['id']; ?>" selected><?php echo $barang['nama']; ?></option>
                          <?php
                        }else{
                          ?>
                          <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama']; ?></option>
                          <?php
                        }
                      }
                    }
                  }
                  ?>
                  </select>
              </div>
              <!--<label class="control-label"> </label>
              <div class="controls">
                <div class="buttons"> 
                  <a id="add-event" data-toggle="modal" href="#modalSimilar" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> Similar</a>
                </div>
              </div>-->
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
                <select multiple="multiple" name="similarBarang[]">
                  <?php 
                  if(isset($dataBarang))
                  {
                    foreach ($dataBarang as $barang) 
                    {
                      echo "<option value='".$barang["id"]."'>".$barang["nama"]."</option>";
                    }
                  }
                  ?>
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
    }

</script>
</body>
</html>