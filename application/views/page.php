<!DOCTYPE html>
<html lang="en">
   <style>
      .lef{
         left: 350px;
      }
   </style>
<?php $this->load->view('_partials/header')  ?>
<?php $this->load->view('_partials/sidenav')  ?>
   <div class="container">
<div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <!-- <span class="toggle_icon" onclick="openNav()"><img src="assets/img/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div> -->
                  <div class="col-5 justify-content-center lef">
            <form method="post" action="<?= site_url('page/cari') ?>">
                <div class="input-group  justify-content-center">
                    <input type="text" class="form-control" placeholder="Cari di Lelang Motor" aria-label="Cari di Lelang Elektronik" id="cari" name="cari" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                        <input type="submit" class="btn btn-info" id="search" value="Cari">
                    </div>
                </div>
            </form>
        </div>
                  <!-- <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true"> -->
                        <!-- <img src="img/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i> -->
                        <!-- </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="img/flag-france.png" class="mr-2" alt="flag">
                           French -->
                           <!-- </a> -->
                        <!-- </div> -->
                     <!-- </div> -->
                     <!-- <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                        </ul>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
              
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Melelang berbagai jenis motor <br>Baru&Bekas</h1>
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                           <!-- <div class="site-blocks-cover overlay" style="background-image: src=('assets/img/motor3.jpg')"  data-aos="fade" data-stellar-background-ratio="0.5"> -->
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Melelang berbagai jenis motor <br>Baru&Bekas</h1>
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Melelang berbagai jenis motor <br>Baru&Bekas</h1>
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Lelang Motor</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <?php foreach ($lelang as $p) { ?>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h2><?= $p->nama_barang?> </h2>
                                 <div class="tshirt_img"><img src="<?= base_url ('upload/barang/'. $p->gambar)?>" </div>
                                 <br>
                                 <br>
                                 <div class="btn_main">
                                    </div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 <p class="price_text">Open Harga <br> <span style="color: #262626;">Rp-, <?= $p->harga_awal?></span></p>
                                 <div class="buy_bt"><a href="<?= site_url('page/detail_lelang/' . $p->id_lelang)?>">Mulai BID <br> Detail</a></div>
                                
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
                       
             </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
     
    
   
   <?php $this->load->view('_partials/footer')  ?>
</html>
      