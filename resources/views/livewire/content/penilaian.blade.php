<div>
    @if ($main)
    <div id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Penilaian</h1>
                        <a href="tambahkriteria.html" id="addKriteriaButton" class="btn btn-primary mb-3">Tambah
                            Penilaian</a>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data
                                    Tabel Normalisasi</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode kos</th>
                                                <th>C1</th>
                                                <th>C2</th>
                                                <th>C3</th>
                                                <th>C4</th>
                                                <th>C5</th>
                                                <th>C6</th>
                                                <th>C7</th>
                                                <th>C8</th>
                                                <th>C9</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datakos as $datakoss)
                                            <tr>
                                                <td>{{ $datakoss->id }}</td>
                                                {{-- <td>{{ $datakoss->jarak_kos->bobot }}</td> --}}
                                                <td>{{ $datakoss->jarak_kos ? $datakoss->jarak->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->biaya ? $datakoss->biaya->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->fasilitas ? $datakoss->fasilitas->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->lokasiPendukung ? $datakoss->lokasiPendukung->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->keamanan ? $datakoss->keamanan->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->ukuranRuangan ? $datakoss->ukuranRuangan->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->batasJamMalam ? $datakoss->batasJamMalam->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->jenisListrik ? $datakoss->jenisListrik->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->kebersihanKos ? $datakoss->kebersihanKos->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>
                                                    <a href="ubahpenilaian.html" class="btn btn-success btn-sm">Ubah</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data
                                    Tabel Penilaian/Perangkingan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode kos</th>
                                                <th>Nama Kos</th>
                                                <th>Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>A1</td>
                                                <td>Runi Kos</td>
                                                <td>85</td>
                                                <td>

                                                    <a href="ubahpenilaian.html" class="btn btn-success btn-sm"> Ubah
                                                    </a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>C02</td>
                                                <td>Fasilitas</td>
                                                <td>Benefit</td>
                                                <td><button class="btn btn-success btn-sm">Ubah</button>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>C03</td>
                                                <td>Lokasi</td>
                                                <td>Benefit</td>
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

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
    </div>
    @endif
    @if ($add)
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Ubah Data Kriteria
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
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    <a href="kriteria.html" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
    @endif

</div>
