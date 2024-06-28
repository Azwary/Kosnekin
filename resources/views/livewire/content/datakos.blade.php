<div>
    <!-- Begin Page Content -->
@if ($main)
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kamar Kos</h1>
    <button wire:click="create" class="btn btn-primary mb-3">Tambah Data Kamar Kos</button>
    {{-- <a wire:click="create()" id="addKriteriaButton" class="btn btn-primary mb-3"></a> --}}


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data
                Tabel Kamar Kos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Kos</th>
                            <th>Nama Kos</th>
                            <th>Alamat</th>
                            <th>Jarak Kos</th>
                            <th>Biaya</th>
                            <th>Fasilitas</th>
                            <th>Lokasi Pendukung</th>
                            <th>Keamanan</th>
                            <th>Ukuran Ruangan</th>
                            <th>Batas Jam Malam</th>
                            <th>Jenis Listrik</th>
                            <th>Kebersihan Kos</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>Kode Kos</th>
                            <th>Nama Kos</th>
                            <th>Jarak Kos</th>
                            <th>Biaya</th>
                            <th>Fasilitas</th>
                            <th>Lokasi Pendukung</th>
                            <th>Keamanan</th>
                            <th>Ukuran Ruangan</th>
                            <th>Batas Jam Malam</th>
                            <th>Jenis Listrik</th>
                            <th>Kebersihan Kos</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        @foreach ($Datakos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_kos }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jarak_kos }}</td>
                                <td>{{ $item->biaya }}</td>
                                <td>{{ $item->fasilitas }}</td>
                                <td>{{ $item->lokasi_pendukung }}</td>
                                <td>{{ $item->keamanan }}</td>
                                <td>{{ $item->ukuran_ruangan }}</td>
                                <td>{{ $item->batas_jam_malam }}</td>
                                <td>{{ $item->jenis_listrik }}</td>
                                <td>{{ $item->kebersihan_kos }}</td>
                                <td>
                                    <button wire:click="Edit('{{ $item->id }}')"
                                        class="btn btn-success btn-sm">Ubah</button>
                                    <button wire:click="delete('{{ $item->id }}')"
                                        class="btn btn-danger btn-sm">Hapus</button>
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
            Tambah Data Kamar Kos
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit.prevent="store">
                @csrf
                <div class="form-group">
                    <label for="nama_kos">Nama Kos</label>
                    <input type="text" class="form-control" id="nama_kos" wire:model="nama_kos" required>
                </div>
                {{-- <div class="form-group">
                    <label for="image">Foto kos</label>
                    <input type="file" class="form-control" id="image" wire:model="image" required>
                </div> --}}
                <div class="form-group mb-4">
                    <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Foto kos</label>
                    <input type="file" class="form-control block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out" id="image" wire:model="image" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" wire:model="alamat" required>
                </div>
                <div class="form-group">
                    <label for="jarak_kos">Jarak Kos</label>
                    <select class="form-control" id="jarak_kos" wire:model="jarak_kos" required>
                        <option value="">Pilih Jenis</option>
                        @foreach ($jarak_kos_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <select class="form-control" id="biaya" wire:model="biaya" required>
                        <option value="">Pilih biaya</option>
                        @foreach ($biaya_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <select class="form-control" id="fasilitas" wire:model="fasilitas" required>
                        <option value="">Pilih fasilitas</option>
                        @foreach ($fasilitas_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lokasi_pendukung">Lokasi Pendukung</label>
                    <select class="form-control" id="lokasi_pendukung" wire:model="lokasi_pendukung" required>
                        <option value="">Pilih lokasi pendukung</option>
                        @foreach ($lokasi_pendukung_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="keamanan">Keamanan</label>
                    <select class="form-control" id="keamanan" wire:model="keamanan" required>
                        <option value="">Pilih keamanan</option>
                        @foreach ($keamanan_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ukuran_ruangan">Ukuran Ruangan</label>
                    <select class="form-control" id="ukuran_ruangan" wire:model="ukuran_ruangan" required>
                        <option value="">Pilih ukuran ruangan</option>
                        @foreach ($ukuran_ruangan_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="batas_jam_malam">Batas Jam Malam</label>
                    <select class="form-control" id="batas_jam_malam" wire:model="batas_jam_malam" required>
                        <option value="">Pilih batas jam malam</option>
                        @foreach ($batas_jam_malam_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_listrik">Jenis Listrik</label>
                    <select class="form-control" id="jenis_listrik" wire:model="jenis_listrik" required>
                        <option value="">Pilih jenis Listrik</option>
                        @foreach ($jenis_listrik_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kebersihan_kos">Kebersihan Kos</label>
                    <select class="form-control" id="kebersihan_kos" wire:model="kebersihan_kos" required>
                        <option value="">Pilih kebersihan kos</option>
                        @foreach ($kebersihan_kos_options as $option)
                            <option value="{{ $option->nama }}">{{ $option->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($add)
                    <button type="submit" class="btn btn-block btn-primary">Tambah</button>
                @endif
                @if ($ubah)
                    <button type="button" class="btn btn-block btn-primary" wire:click="update()">Simpan Perubahan</button>
                @endif
            </form>
        </div>
    </div>
</div>

@endif

</div>
