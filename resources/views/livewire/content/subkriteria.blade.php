<div>
    @if ($main)
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sub Kriteria</h1>



          <style>
            .margin-bottom-20 {
                margin-bottom: 20px;
            }
        </style>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >


                    <tbody>
                        <tr>
                            <td>Nama Kriteria</td>
                            <td>:C1-Jarak kost</td>

                        </tr>
                        <tr>
                            <td>Bobot</td>
                            <td>:15</td>


                        </tr>
                        <tr>
                            <td>Tipe</td>
                            <td>:cost</td>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

          <div class="container text-center">



        <a href="kriteria" class="btn btn-warning btn-sm"> Kembali </a>
          </div>

          <br>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data
                    Tabel Sub Kriteria</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Subkriteria</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>50 meter</td>
                                <td>1</td>
                                <td>
                                <a href="ubahsubkriteria.html" class="btn btn-success btn-sm"> Ubah </a>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>>50-250 meter</td>
                                <td>2</td>
                                <td><button class="btn btn-success btn-sm">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>>250m-1km</td>
                                <td>3</td>
                                <td><button class="btn btn-success btn-sm">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>>1km-2,5km</td>
                                <td>4</td>
                                <td><button class="btn btn-success btn-sm">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    @endif

    @if ($add)
    <!-- Tambah Kriteria Modal-->
<div class="modal fade" id="addKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="addKriteriaForm">
            <div class="form-group">
                <label for="kodeKriteria">Kode</label>
                <input type="text" class="form-control" id="kodeKriteria" name="kodeKriteria" required>
            </div>
            <div class="form-group">
                <label for="namaKriteria">Nama</label>
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
                <input type="number" class="form-control" id="bobotKriteria" name="bobotKriteria" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>
</div>
</div>
    @endif
</div>