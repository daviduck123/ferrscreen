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
          </tr>
          <?php 
        $number++;
      }
    }
?>
