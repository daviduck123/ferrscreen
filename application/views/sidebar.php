<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-dashboard"></i> Dashboard</a>
  <ul>
    <li class="<?php if($menuAktif=="dashboard") echo "active";?>"><a href="<?php echo base_url();?>dashboard"><i class="icon icon-dashboard"></i> <span>Dashboard</span></a> </li>
    <li class="submenu <?php if($menuAktif=="masterdata") echo "active open";?>"> <a href="#"><i class="icon icon-th-list"></i> <span>Master Data</span> <!-- <span class="label label-important">3</span> --></a>
      <ul>
        <li class="<?php if($subMenu=="general") echo "active";?>"><a href="<?php echo base_url();?>general">General</a></li>
        <li class="<?php if($subMenu=="jabatan") echo "active";?>"><a href="<?php echo base_url();?>jabatan">Jabatan</a></li>
        <li class="<?php if($subMenu=="karyawan") echo "active";?>"><a href="<?php echo base_url();?>karyawan">Karyawan</a></li>
        <li class="<?php if($subMenu=="supplier") echo "active";?>"><a href="<?php echo base_url();?>supplier">Supplier</a></li>
        <li class="<?php if($subMenu=="toko") echo "active";?>"><a href="<?php echo base_url();?>toko">Toko</a></li>
        <li class="<?php if($subMenu=="merk") echo "active";?>"><a href="<?php echo base_url();?>merk">Merk</a></li>
        <li class="<?php if($subMenu=="type") echo "active";?>"><a href="<?php echo base_url();?>type">Type</a></li>
        <li class="<?php if($subMenu=="barang") echo "active";?>"><a href="<?php echo base_url();?>barang">Barang</a></li>
      </ul>
    </li>
    <li class="<?php if($menuAktif=="penjualan") echo "active";?>"> <a href="<?php echo base_url();?>penjualan"><i class="icon icon-tag"></i> <span>Penjualan</span></a> </li>
    <li class="<?php if($menuAktif=="pembelian") echo "active";?>"><a href="<?php echo base_url();?>pembelian"><i class="icon  icon-shopping-cart"></i> <span>Pembelian</span></a></li>
    <li class="submenu <?php if($menuAktif=="laporan") echo "active open";?>"> <a href="#"><i class="icon icon-book"></i> <span>Laporan</span><!--  <span class="label label-important">3</span> --></a>
      <ul>
        <li class="<?php if($subMenu=="labarugi") echo "active";?>"><a href="<?php echo base_url();?>laporan/labarugi">Laba Rugi</a></li>
        <li class="<?php if($subMenu=="Karyawan") echo "active";?>"><a href="<?php echo base_url();?>laporan/karyawan">Karyawan</a></li>
        <li class="<?php if($subMenu=="toko") echo "active";?>"><a href="<?php echo base_url();?>laporan/toko">Toko</a></li>
        <li class="<?php if($subMenu=="pengeluaran") echo "active";?>"><a href="<?php echo base_url();?>laporan/pengeluaran">Pengeluaran</a></li>
        <li class="<?php if($subMenu=="pemasukan") echo "active";?>"><a href="<?php echo base_url();?>laporan/pemasukan">Pemasukan</a></li>
      </ul>
    </li>
   <!--  <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>User Account</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="<?php /*echo base_url()*/;?>ucAdmin">Admin</a></li>
        <li><a href="<?php /*echo base_url()*/;?>ucKaryawan">Karyawan</a></li>
      </ul>
    </li> -->
    <li  class="<?php if($menuAktif=="ePajak") echo "active";?>"><a href="<?php echo base_url();?>ePajak"><i class="icon icon-pencil"></i> <span>E-faktur Pajak</span></a></li>
    <li class="<?php if($menuAktif=="programCashback") echo "active";?>"><a href="<?php echo base_url();?>programCashback"><i class="icon icon-pencil"></i> <span>Program Cashback</span></a></li>
  </ul>
</div>