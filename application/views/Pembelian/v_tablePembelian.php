<tr class="gradeX">
  <td></td>
  <td>
    <input type="text" name="disableBukaTabelPembelian" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
    <a href="#popTabelPembelian" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
  </td>
  <td>
    <input type="text" name="disableBukaTabelPembelian" id="disableBukaTabelPembelian" placeholder="disableBukaTabelPembelian" disabled>
    <a href="#popTabelPembelian" data-toggle="modal" class="btn btn-info btn-mini" role="button">Buka</a>
  </td>
  <td>
    <input type="text" name="hargaTabelPembelian" id="hargaTabelPembelian" placeholder="Masukkan harga">
  </td>
  <td>
    <input type="text" name="jumlahTabelPembelian" id="jumlahTabelPembelian" placeholder="Masukkan jumlah">
  </td>
  <td>
    <input type="text" name="subTotalTabelPembelian" id="subTotalTabelPembelian" placeholder="Subtotal" disabled>
  </td>
  <td>
    <textarea rows="4" cols="50" name="keteranganTabelPembelian" id="keteranganTabelPembelian" placeholder="Masukkan keterangan"></textarea>
  </td>
  <td class="center">
    <a href="<?php echo base_url();?>Pembelian/tambahTabelPembelian/" class="btn btn-success btn-mini" role="button">Tambah</a>
  </td>
</tr>
<?php 
  if(isset($dataPembelian))
  {
      $number=1;
      foreach ($dataPembelian as $pembelian) 
      {
          $btn = false;
          ?>
          <tr class="gradeX">
            <td style = "vertical-align: middle;"><?php echo $number ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian['nama'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian["kode"] ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian['harga'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian['jumlah'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian['subTotal'] ?></td>
            <td style = "vertical-align: middle;"><?php echo $pembelian['keterangan'] ?></td>
            <td class="center">
              <a href="<?php echo base_url();?>Pembelian/hapusPembelian/<?php echo $number ?>" class="btn btn-warning btn-mini" role="button">Edit</a>
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
                  <a class="btn btn-primary" href="<?php echo base_url();?>Pembelian/hapusPembelian/<?php echo $number ?>" name="btnHapus">Hapus</a> 
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




