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
                            <button style='float:right; margin-left: 3px;' class="btn btn-success btn-mini" data-toggle="modal" data-target="#updateModal"
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
                            <button class="btn btn-danger btn-mini" data-toggle="modal" data-target="#hapusModal"
                              data-id="<?php echo $barang['id']; ?>"
                              data-title="Hapus Barang"
                              onclick="OpenModal(<?php echo $number; ?>)"
                              id="btnModal<?php echo $number; ?>"
                              >Hapus</button>
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
                <?php print_r($dataBarang[0]);?>

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
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Nota</h4>
            </div>

            <div class = "modal-body">
                <!-- Di sini nanti buat table untuk update Stok yang di dapat dari Stok-Supplier -->
                <!-- Data tergantung dari Supplier Barang, klo ada array isinya, maka ada isinya -->
                <!-- Klo ga ada isinya, ada inputan, Combobox supplier, Input Box Stok, button Hapus -->
                <?php print_r($dataBarang[0]['supplier_barang']);?>

            </div>
            <div class="modal-footer">
                <button class="btn btn-github" data-dismiss="modal">Kembali</button>
                <button class="btn btn-success" name="btn_submit">Update</button>
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
        var kode = $("#btnModal" + angka).data('kode');
        var nama = $("#btnModal" + angka).data('nama');
        var status = $("#btnModal" + angka).data('status');
        var hakakses = $("#btnModal" + angka).data('hakakses');
        var username = $("#btnModal" + angka).data('username');
        var poin = $("#btnModal" + angka).data('poin');
        var hakakses2 = 'Karyawan';
        if (hakakses === 1) {
            hakakses2 = "Pemilik";
        }
        var status2 = "Resign";
        if (status === 1) {
            status2 = "Aktif";
        }
        document.getElementById("id").innerHTML = id;
        document.getElementById("kode").innerHTML = kode;
        document.getElementById("namax").innerHTML = nama;
        document.getElementById("poin").innerHTML = poin;
        document.getElementById("hakakses2").innerHTML = hakakses2;
        document.getElementById("usernamex").innerHTML = username;
        document.getElementById("status2").innerHTML = status2;
        $.ajax({
            url: "<?php echo site_url(); ?>/c_master_data/getTableDaftarKaryawan",
            type: "POST",
            data: {id: $("#btnModal" + angka).data('id')},
            dataType: "html",
            success: function(data) {
                $("#javascript").html(data);
            }
        });

        $(".modal-body #id").val(id);
        $(".modal-body #kode").val(kode);
        $(".modal-body #nama").val(nama);
        $(".modal-body #poin").val(poin);
        $(".modal-body #hakakses").val(hakakses);
        $(".modal-body #username").val(username);
        $(".modal-body #status").val(status);
        $(".modal-title").text( title+' Karyawan');
    }
</script>
</body>
</html>