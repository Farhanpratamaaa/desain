<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('backend/_partials/header') ?>
</head>
<body>
    <main class="main">
    <?php $this->load->view('backend/_partials/sidenav') ?>

    <div class="content">
        <h4>Data Penawaran</h4>
      
        <table id="penawaran" class="table">
        <thead>
            <tr>
                <th>Tgl Penawaran</th>
                <th>Nama Barang</th>
                <th>Nama Penawar</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Setatus Penawaran</th>
                <th>Harga Awal</th>
                <th>Harga Penawaran</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>
            <?php foreach ($penawaran as $p) : ?>
             <tr>
                <td><?= $p->tgl_penawaran ?></td>
                <td><?= $p->nama_barang ?></td>
                <td><?= $p->nama_penawar ?></td>
                <td><?= $p->no_hp ?></td>
                <td><?= $p->email_penawar ?></td>
                <td><?= $p->status_penawar ?></td>
                <td><?= $p->harga_awal ?></td>
                <td><?= $p->harga_penawaran ?></td>
                <td>
                <a href="<?= site_url('Lelang/edit/' . $p->id_penawaran) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                     <a href="" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
                </td>
             </tr>    
            <?php endforeach ?>
        </tbody>
    </table>


        <?php $this->load->view('backend/_partials/footer') ?>
    </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        var table = $('#penawaran').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</html>