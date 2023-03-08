<!DOCTYPE html>
<html Lang="en">

<head>
    <?php $this->load->view('backend/_partials/header') ?>
</head>

<body>
    <main class="main">
        <?php $this->load->view('backend/_partials/sidenav') ?>

        <div class="content">
            <h4>Data Lelang</h4>

            <!-- Start kodingan di sini -->
            <table id="lelang" class="table">
                <thead class="thead-dark">
                    <a class="btn btn-primary mb-2" href="<?= site_url('backend/lelang/new'); ?>">Tambah Data</a>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Penanggung Jawab</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lelang as $m) : ?>
                        <tr>
                            <td><?= $m->tgl_mulai ?></td>
                            <td><?= $m->tgl_akhir ?></td>
                            <td><?= $m->nama_barang ?></td>
                            <td>IDR <?= number_format($m->harga_awal, 2) ?></td>
                            <td><?= $m->penanggungjawab ?></td>
                            <td><?= $m->status ?></td>
                            <td>
                                <img src="<?= empty($m->gambar) ? base_url('assets/images/no_image.png') : base_url('upload/barang/' . $m->gambar) ?>" width="100px">
                            </td>
                            <td>
                                <?php if ($m->allow_edit == 1 && $m->status == "open") : ?>
                                    <a href="<?= site_url('backend/lelang/edit/' . $m->id_lelang) ?>"><button type="button" class="btn btn-warning" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="#" data-delete-url="<?= site_url('backend/lelang/cancel/' . $m->id_lelang) ?>" onclick="deleteConfirm(this)"><button type="button" class="btn btn-danger" title="Cancel"><i class="fa-solid fa-xmark"></i></button></a>
                                <?php endif ?>
                                <?php if ($m->allow_edit == 0 && $m->status == "open") : ?>
                                    <a href="#" data-delete-url="<?= site_url('backend/lelang/close/' . $m->id_lelang) ?>" onclick="deleteConfirm(this)"><button type="button" class="btn btn-primary" title="Close"><i class="fa-solid fa-lock"></i></button></a>
                                <?php endif ?>

                            </td>
                        </tr>


                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- End -->

</html>
<?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>

<script>
    $(document).ready(function() {
        var table = $('#lelang').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<!-- Sweatalert JS -->
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Yakin hapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya Hapus',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>