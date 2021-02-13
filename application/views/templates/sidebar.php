<?php $side=$this->uri->segment(1);?>
<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">Sertifikat</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">STF</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Navigation</li>

       <li class="<?=$side=='karyawan'?'active':''?>"><a class="nav-link" href="<?=base_url('karyawan')?>"><i class="fas fa-user-tie"></i><span>Karyawan</span></a></li> 

       <li class="<?=$side=='sertifikat'?'active':''?>"><a class="nav-link" href="<?=base_url('sertifikat')?>"><i class="fab fa-product-hunt"></i><span>Sertifikat</span></a></li> 

       <li class="<?=$side=='sertifikat_karyawan'?'active':''?>"><a class="nav-link" href="<?=base_url('sertifikat_karyawan')?>"><i class="fas fa-keyboard"></i><span>Sertifikat Karyawan</span></a></li>

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>