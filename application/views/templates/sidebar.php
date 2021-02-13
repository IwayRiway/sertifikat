<?php $side=$this->uri->segment(1);?>
<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">QR Code</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">QR-C</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Navigation</li>

       <li class="<?=$side=='customer'?'active':''?>"><a class="nav-link" href="<?=base_url('customer')?>"><i class="fas fa-user-tie"></i><span>Data Customer</span></a></li> 

       <li class="<?=$side=='produk'?'active':''?>"><a class="nav-link" href="<?=base_url('produk')?>"><i class="fab fa-product-hunt"></i><span>Data Product</span></a></li> 

       <li class="<?=$side=='transaksi'?'active':''?>"><a class="nav-link" href="<?=base_url('transaksi')?>"><i class="fas fa-keyboard"></i><span>Input Transaksi</span></a></li> 

       <li class="<?=$side=='user'?'active':''?>"><a class="nav-link" href="<?=base_url('user')?>"><i class="fas fa-users-cog"></i><span>Manajemen User</span></a></li> 

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>