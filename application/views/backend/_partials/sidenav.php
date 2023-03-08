<aside class="side-nav" style="height:auto; min-height:100vh;">
    <div class="brand">
		<h2>
            
			<h4>Lelang Motor</h4>
            <img src="<?= base_url('assets/img/motor7.png') ?>" style="margin-left : 10px;" width="80%">
        </h2>
	</div>
	<nav>
		<a href="<?= site_url('backend')?>">Dashboard</a>
		<?php if($activeUser->level == "Admin") : ?>
			<a href="<?= site_url('backend/masyarakat')?>">Masyarakat</a>
			<a href=" <?= site_url('backend/user')?>">User</a>
		<?php endif ?>

		<?php if($activeUser->level == "Petugas") : ?>
		<a href="<?= site_url('backend/barang')?>">Kelola Barang</a>
		<a href="<?= site_url('backend/lelang')?>"">Kelola Lelang</a>
		<a href="<?= site_url('backend/penawaran')?>">Riwayat Penawaran</a>
		<a href="<?= site_url('backend/laporan')?>">Laporan Pemenang</a>
		<?php endif ?>


		<a href="<?= site_url('backend/auth/logout') ?>">Logout</a>
	</nav>
</aside>