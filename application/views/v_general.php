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
      <a href="<?php echo base_url();?>general" class="">
        Barang
      </a>
    </div>
    <h1>General</h1>
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
            echo form_open("general/updateGeneral/",
              array(
                'name' => 'basic_validate', 
                'id' => 'basic_validate',
                'novalidate' => 'novalidate',
                'class' => "form-horizontal"
              )
            ); 
            ?>
           <?php
           /*print_r($general);
           exit();*/
           ?>
            <div class="control-group">
              <label class="control-label">Komisi Normal</label>
              <div class="controls">
                <input type="text" name="komisiNormal" id="komisiNormal" value="<?php echo $general[0]["komisi_normal"] ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Komisi Diskon</label>
              <div class="controls">
                <input type="text" name="komisiDiskon" id="komisiDiskon" value="<?php echo $general[0]["komisi_diskon"] ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Komisi Low</label>
              <div class="controls">
                <input type="text" name="komisiLow" id="komisiLow" value="<?php echo $general[0]["komisi_low"] ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga Plus Normal</label>
              <div class="controls">
                <input type="text" name="plusNormal" id="plusNormal" value="<?php echo $general[0]["plus_normal"] ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga Plus Low</label>
              <div class="controls">
                <input type="text" name="plusLow" id="plusLow" value="<?php echo $general[0]["plus_low"] ?>">
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="btnTambah" value="Update" class="btn btn-success"/>
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