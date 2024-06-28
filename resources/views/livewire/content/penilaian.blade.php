<div>
    @if ($main)
        <div id="page-top">
            <div id="wrapper">
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800">Penilaian</h1>
                            {{-- <button wire:click="create" class="btn btn-primary mb-3">Tambah Penilaian</button> --}}

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tabel Normalisasi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable1" width="100%"
                                            cellspacing="0">
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
                                                    <th>Total</th>
                                                    {{-- <th>Aksi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach ($datakos as $datakoss)
                                            <tr>
                                                <td>{{ $datakoss->id }}</td>
                                                <td>{{ $datakoss->jarak ? $datakoss->jarak->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->biaya ? $datakoss->biayaa->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->fasilitas ? $datakoss->fasilitass->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->lokasiPendukung ? $datakoss->lokasiPendukung->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->keamanan ? $datakoss->keamanann->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->ukuranRuangan ? $datakoss->ukuranRuangan->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->batasJamMalam ? $datakoss->batasJamMalam->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->jenisListrik ? $datakoss->jenisListrik->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $datakoss->kebersihanKos ? $datakoss->kebersihanKos->bobot ?? 'N/A' : 'N/A' }}</td>
                                                <td>{{ $this->calculateTotal($datakoss) }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tabel Penilaian/Perangkingan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable2" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Kode kos</th>
                                                    <th>Nama Kos</th>
                                                    <th>Nilai</th>
                                                    {{-- <th>Aksi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datakos as $penilai)
                                                    <tr>
                                                        <td>{{ $penilai->id }}</td>
                                                        <td>{{ $penilai->nama_kos }}</td>
                                                        <td>{{ $penilai->nilai }}</td>
                                                        {{-- <td>
                                                    <a href="ubahpenilaian.html" class="btn btn-success btn-sm">Ubah</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
