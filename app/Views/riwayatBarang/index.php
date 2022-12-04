<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">id_barang</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($riwayat as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i ?> </th>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['id_barang']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td><?= $row['ket']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->

<!-- Modal -->