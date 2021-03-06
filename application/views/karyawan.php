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
        Karyawan
      </a>
    </div>
    <h1>Karyawan</h1>
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
          <a href="<?php echo base_url();?>karyawan/tambahKaryawan"> 
            <i class="icon-plus-sign"></i> 
            <!--<span class="label label-important">20</span>-->
            Tambah Karyawan
          </a>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Karyawan</th>
                  <th>Alamat</th>
                  <th>Nomor HP</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">
                  <td>1</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>082234555</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeC">
                  <td>2</td>
                  <td>Ola Ramlan</td>
                  <td>Jalan Diponegoro IX</td>
                  <td>082342314</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>3</td>
                  <td>Jackie Chan</td>
                  <td>Jalan Teuku Umar 12f</td>
                  <td>082334314</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>4</td>
                  <td>Jojo Admiman</td>
                  <td>Jalan Lamongan 67</td>
                  <td>0823345345</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>5</td>
                  <td>Konami Mirane</td>
                  <td>Jalan Jojobizzare 21</td>
                  <td>0823244114</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>6</td>
                  <td>Horor Movie</td>
                  <td>Jalan Demak Komang</td>
                  <td>0812323344</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>7</td>
                  <td>Doni Winata</td>
                  <td>Jalan Dianea sewa 12X</td>
                  <td>0887789123</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>8</td>
                  <td>Erric Setiawan</td>
                  <td>Jalan Hidup Mulia 31</td>
                  <td>0856756555</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>9</td>
                  <td>Jenny Deriana</td>
                  <td>Jalan Poblic 63</td>
                  <td>0843453456</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>10</td>
                  <td>Dodit Wicaksana</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>08678678252</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>11</td>
                  <td>Deni Liliana</td>
                  <td>Jalan Tambun Selan 21</td>
                  <td>08345346356</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>12</td>
                  <td>Dedi Wicaksono</td>
                  <td>Jalan Incredible Musikal 21</td>
                  <td>0844353223</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>13</td>
                  <td>Kajak Timur</td>
                  <td>Jalan Nonikamura 12x</td>
                  <td>0874564223</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>14</td>
                  <td>Niara Mukahia</td>
                  <td>Jalan Polinema Makina</td>
                  <td>0889789743</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>15</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>0877752357</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>16</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>0865756673</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>17</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>0845444522</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>18</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>08768676663</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>19</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>0866634533</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
                <tr class="gradeA">
                  <td>20</td>
                  <td>Deni Wahyuni</td>
                  <td>Jalan Penglima Sudirman 10x</td>
                  <td>08564544421</td>
                  <td class="center">
                      <button class="btn btn-success btn-mini">Edit</button>
                      <button class="btn btn-warning btn-mini">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
</body>
</html>