<!DOCTYPE html>
<html Lang="en">

<head>
    <?php $this->load->view('backend/_partials/header') ?>
</head>
<body> 
    <main class="main">
        <?php $this->load->view('backend/_partials/sidenav') ?>
        
        <div class="content">
            <h4>Data User</h4>
            
            <!-- Start kodingan di sini -->
            <table id="user" class="table">
                <thead>
                <a class="btn btn-success mb-2" href="<?= site_url('backend/user/add'); ?>">Tambah Data</a>
                <tr> 
                        <th>Username</th>   
                    
                        <th>Nip</th> 
                        <th>Nama</th> 
                        <th>Level</th> 
                        <th>Status</th>  
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $u) : ?>
                        <tr> 
                            <td><?= $u->username ?></td>
                           
                            <td><?= $u->nip ?></td>
                            <td><?= $u->nama ?></td>
                            <td><?= $u->level ?></td>
                            <td><?= $u->status == 1 ? "Aktif" : "Non-aktif" ?></td>
                            <td>
                                        <?php if (($activeUser->level == "Admin" || $activeUser->id_user == $u->id_user) && $u->status <> 0) : ?>
                                            <a href="<?= site_url('backend/user/edit/' . $u->id_user) ?>">
                                                <button type="button" class="btn btn-warning" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </a>
                                            <a href="<?= site_url('backend/user/change/' . $u->id_user) ?>">
                                                <button type="button" class="btn btn-info" title="Change Password">
                                                    <i class="fa-solid fa-lock"></i>
                                                </button>
                                            </a>
                                        <?php endif ?>
                                        <!-- hapus -->
                                        <?php if ($u->status == 1 && $activeUser->level == "Admin") : ?>
                                            <a href="#" data-confirm-url="<?= site_url('backend/user/blokir/' . $u->id_user) ?>" onclick="dataConfirm(this)"><button type="button" class="btn btn-danger" title="Block"><i class=" fa-solid fa-user-xmark"></i></button></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                </tbody>
            </table>
            <?php $this->load->view('backend/_partials/footer') ?>
        </div>
            <!-- End -->
            </html>
            <?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
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

<!-- Datatable -->
<script>
    $(document).ready(function() {
        var table = $('#user').DataTable({
            buttons: ['copy', 'excel', 'pdf', 'print'],
            dom: "<'row '<'col-md-4'l> <'col-md-4'B> <'col-md-4'f>>" +
                "<'row '<'col-md-12'tr>>" +
                "<'row '<'col-md-5'i> <'col-md-7'p>>",
            lengthChange: true
        });

        table.buttons().container()
            .appendTo('#user_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Sweatalert JS -->
<script>
    function dataConfirm(event) {
        Swal.fire({
            title: 'Update Confirmation!',
            text: 'Yakin blok data user ini?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.confirmUrl);
            }
        });
    }
</script>