<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="">Master Data</a> <a href="#" class="">Barang</a> <a href="#" class="current">Tambah Barang</a></div>
    <h1>Tambah Barang</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Tambah Barang</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>barang/prosesTambahBarang" name="basic_validate" id="basic_validate" novalidate="novalidate">
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
              <label class="control-label">Merk Sama</label>
              <div class="controls">
                <select multiple="multiple" name="similarMerk[]">
                  <?php 
                    foreach ($dataMerk as $merk) 
                    {
                      echo "<option value='".$merk[id]."'>".$merk[nama]."</option>";
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
                    foreach ($dataMerk as $merk) 
                    {
                      echo "<option value='".$merk[id]."'>".$merk[nama]."</option>";
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
            </div>
              <div class="form-actions">
                <input type="submit" name="btnBatal" value="Batal" class="btn btn-info"/>
                <input type="submit" name="btnTambah" value="Tambah" class="btn btn-success"/>
              </div>
            </form>
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
                    foreach ($dataBarang as $barang) 
                    {
                      echo "<option value='".$barang[id]."'>".$barang[nama]."</option>";
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
                      foreach ($dataBarang as $a) 
                      {
                        echo "'<option value=".'"'.$a["id"].'"'.">".$a["nama"]."</option>'+";
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