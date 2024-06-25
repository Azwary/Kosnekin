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
                        {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kriteria</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @foreach ($kriteriaa as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>
                                            <button wire:click="Edit('{{ $item->id }}')"
                                                class="btn btn-success btn-sm">Ubah</button>
                                            <button wire:click="delete('{{ $item->id }}')"
                                                class="btn btn-danger btn-sm">Hapus</button>

                                            <a wire:click="homesub('{{ $item->id }}')" class="btn btn-info btn-sm"> Subkriteria </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endif
    @if ($add || $ubah)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ $ubah ? 'Ubah Data Kriteria' : 'Tambah Data Kriteria' }}
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="namaKriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="namaKriteria" name="namaKriteria"
                                wire:model="nama_kriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control" id="jenis" name="jenis" wire:model="jenis" required>
                                <option value="">Pilih Jenis</option>
                                @foreach ($nama_jenis as $option)
                                    <option value="{{ $option->jenis }}">{{ $option->jenis }}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobotKriteria">Bobot</label>
                            <input type="number" class="form-control" id="bobotKriteria" name="bobotKriteria"
                                wire:model="bobot" step="0.01" required>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            @if ($add)
                                <button type="button" class="btn btn-block btn-primary"
                                    wire:click="store">Tambah</button>
                            @endif
                            @if ($ubah)
                                <button type="button" class="btn btn-block btn-primary" wire:click="update">Simpan
                                    Perubahan</button>
                            @endif
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-block btn-secondary"
                                wire:click="cancel">Batal</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if ($mainsub)
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
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama Kriteria</td>
                                <td>{{ $nama_kriteria }}</td>

                            </tr>
                            <tr>
                                <td>Bobot</td>
                                <td>{{ $bobot }}</td>


                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>{{ $jenis }}</td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container text-center">



                <a wire:click="cancel" class="btn btn-warning btn-sm"> Kembali </a>
                <a wire:click="createsub('{{ $kode_kriteria }}')" class="btn btn-info btn-sm">Tambah Subkriteria</a>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Subkriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($jarak_kos_options as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <a href="ubahsubkriteria.html" class="btn btn-success btn-sm"> Ubah </a>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endif

    @if ($addsub)
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Subkriteria
                </div>
                <div class="card-body">
                    {{-- <form id="addKriteriaForm"> --}}
                    <form wire:submit.prevent="storesub('{{ $kode_kriteria }}')">
                        <div class="form-group">
                            <label for="nama_subkriteria">Nama Subkriteria</label>
                            <input type="text" class="form-control" id="nama_subkriteria" wire:model="nama_subkriteria" name="nama_subkriteria"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="bobot_subkriteria">Bobot</label>
                            <input type="decimal" class="form-control" id="bobot_subkriteria" wire:model="bobot_subkriteria" name="bobot_subkriteria"
                                step="5" required>
                        </div>
                        <button type="button" class="btn btn-block btn-primary"
                                    wire:click="storesub('{{ $kode_kriteria }}')">Tambah</button>
                        {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                        {{-- <a wire:click="homesub('{{ $kode_kriteria }}')" class="btn btn-secondary">Batal</a> --}}
                    </form>
                </div>
            </div>
        </div>
    @endif



    <!-- /.container-fluid -->

</div>
