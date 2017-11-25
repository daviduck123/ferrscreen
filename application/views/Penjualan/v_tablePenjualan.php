<tr class="gradeX">
  <td></td>
  <td>
    <a href="#popKodeTabelPenjualan" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Kode</a>
  </td>
  <td>
    <a href="#popNamaTabelPenjualan" data-toggle="modal" class="btn btn-success btn-mini" role="button">Input Nama</a>
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
            <td style = "vertical-align: middle;"><?php echo $penjualan["kode"] ?></td>
            <td style = "vertical-align: middle;"><?php echo $penjualan['nama'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $penjualan['harga'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $penjualan['jumlah'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $penjualan['subTotal'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $penjualan['keterangan'] ?></td>
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
