<div class="banner_bg_main">
<div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="<?= site_url('page') ?>">Home</a></li>
                           <?php if ($activeUser) : ?>
                           <li><a href="<?= site_url('page/penawaran') ?>">Riwayat</a></li>
                           <li><a href="<?= site_url('page/lelang') ?>">Lelang</a></li>
                           <li><a href="<?= site_url('page/edit') ?>">Hi, <?= $activeUser->nama ?></a></li>
                           <li><a href="<?= site_url('page/change') ?>">Ganti Password</a></li>
                           <li><a href="<?= site_url('page/logout') ?>">Logout</a></li>
                           <?php endif ?>
                           <?php if (!$activeUser) : ?>
                           <li><a href="<?= site_url('page/login')?>">Login</a></li>
                           <li><a href="<?= site_url('page/register')?>">Register</a></li>
                           <?php endif ?>
                           <!-- <li><a href="#">Customer Service</a></li> -->
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"> </a></div>
                  </div>
               </div>
            </div>
         </div>