<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data barang berhasil <strong><?= session()->getFlashdata('message'); ?> </strong>
        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger' role='alert'>" . session()->get('err') . "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data</i>
            </button>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <!-- <th scope="col">ID Barang</th> -->
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i ?> </th>
                            <td><?= $row['nama_barang']; ?></td>
                            <!-- <td><?= $row['id_barang']; ?></td> -->
                            <td><?= $row['jumlah']; ?></td>
                            <td>Rp. <?= $row['harga']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-sm btn-warning" id="btn-edit" data-id="<?= $row['id_barang'] ?>" data-nama="<?= $row['nama_barang'] ?> " data-jumlah="<?= $row['jumlah'] ?>" data-harga="<?= $row['harga'] ?>">
                                    <i class="fa fa-edit"></i></button>
                                <a href="/hapus/<?= $row['id_barang'] ?>" type=" button" class="btn btn-sm btn-danger" id="btn-hapus" data-id="<?= $row['id_barang'] ?>"><i class="fa fa-trash-alt"></i></a>
                                <!-- <a href="/diskon//" type="button" class="btn btn-sm btn-info" id="btn-edit" data-id="<?= $row['id_barang'] ?>" data-nama="<?= $row['nama_barang'] ?> " data-jumlah="<?= $row['jumlah'] ?>" data-harga="<?= $row['harga'] ?>">
                                    <i class="fas fa-percentage"></i></a> -->
                            </td>
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

<!-- Modal tambah data-->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/add'); ?>" method="post">
                    <!-- <div class="form-group mb-0">
                        <label for=""></label>
                        <input type="text" name="nama_table" id="nama_table" class="form-control" placeholder="Masukkan nama Table">
                    </div> -->
                    <div class="form-group mb-2">
                        <label for="">ID</label>
                        <input type="number" name="id_barang" id="id_barang" class="form-control" placeholder="Masukkan id barang">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan nama Barang">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!-- Modal -->



<!-- Modal Ubah data-->
<div class=" modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/edit'); ?>" method="post">

                    <!-- <div class="form-group mb-0">
                        <label for=""></label>
                        <input type="text" name="nama_table" id="nama_table" class="form-control" placeholder="Masukkan nama Table">
                    </div> -->
                    <div class="form-group mb-0">
                        <label for=""></label>
                        <input type="hidden" name="id_barang" id="id_barang" class="form-control" placeholder="Masukkan id barang">
                    </div>
                    <div class="form-group mb-0">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan nama Barang">
                    </div>
                    <div class="form-group mb-0">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                    <div class="form-group mb-0">
                        <label for="">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="Ubah" class="btn btn-primary">Edit</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal diskon-->
<!-- Button trigger modal -->

<!-- Modal -->