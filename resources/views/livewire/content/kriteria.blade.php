<div>
    <!-- Begin Page Content -->
    @if ($main)
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Kriteria</h1>
            <button wire:click="create" class="btn btn-primary mb-3">Tambah Kriteria</button>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data
                        Tabel Kriteria</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>C01</td>
                                    <td>Biaya</td>
                                    <td>Cost</td>
                                    <td>0.3</td>
                                    <td>

                                        <a href="ubahkriteria.html" class="btn btn-success btn-sm"> Ubah </a>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                        <a href="tambahsubkriteria" class="btn btn-info btn-sm">Tambah Subkriteria
                                        </a>
                                        <a href="subkriteria" class="btn btn-info btn-sm"> Subkriteria </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endif
    @if ($add)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Kriteria
                </div>
                <div class="card-body">
                    <form id="addKriteriaForm">
                        <div class="form-group">
                            <label for="kodeKriteria">Kode</label>
                            <input type="text" class="form-control" id="kodeKriteria" name="kodeKriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="namaKriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="namaKriteria" name="namaKriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="jenisKriteria">Jenis</label>
                            <select class="form-control" id="jenisKriteria" name="jenisKriteria" required>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobotKriteria">Bobot</label>
                            <input type="number" class="form-control" id="bobotKriteria" name="bobotKriteria"
                                step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="kriteria.html" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <!-- /.container-fluid -->

</div>
