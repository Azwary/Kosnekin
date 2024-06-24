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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
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
                    </thead>
                    <tfoot>
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
                    </tfoot>
                    <tbody>

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
            Tambah Data Kamar Kos
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form>
                @csrf
                <div class="form-group">
                    <label for="nama_kos">Nama Kos</label>
                    <input type="text" class="form-control" id="nama_kos" wire:model="nama_kos" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" wire:model="alamat" required>
                </div>
                <div class="form-group">
                    <label for="jarak_kos">Jarak Kos</label>
                    <select class="form-control" id="jarak_kos" wire:model="jarak_kos" required>
                        <option value="50 meter">50 meter</option>
                        <option value=">50-250 meter">>50-250 meter</option>
                        <option value=">250meter-1km">>250meter-1km</option>
                        <option value=">1-2,5km">>1-2,5km</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <select class="form-control" id="biaya" wire:model="biaya" required>
                        <option value="<=Rp.700.000-Rp.900.000"><=Rp.700.000-Rp.900.000< /option>
                        <option value=">Rp.900.000-Rp.1.300.000">>Rp.900.000-Rp.1.300.000</option>
                        <option value="Rp.1.300.000-Rp.1.600.000">Rp.1.300.000-Rp.1.600.000</option>
                        <option value=">Rp.1.600.000-Rp.2.000.000">>Rp.1.600.000-Rp.2.000.000</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <select class="form-control" id="fasilitas" wire:model="fasilitas" required>
                        <option value="kasur,lemari">kasur,lemari</option>
                        <option value="kasur,lemari,dan kipas">kasur,lemari,dan kipas</option>
                        <option value="kasur,lemari,kipas/AC,dan kamar mandi dalam">kasur,lemari,kipas/AC,dan kamar
                            mandi dalam</option>
                        <option value="kasur,lemari,kipas/AC,dan kamar mandi dalam,Wifi dan parkir luas">
                            kasur,lemari,kipas/AC,dan kamar mandi dalam,Wifi dan parkir luas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lokasi_pendukung">Lokasi Pendukung</label>
                    <select class="form-control" id="lokasi_pendukung" wire:model="lokasi_pendukung" required>
                        <option value="Dekat dengan tempat makan">Dekat dengan tempat makan</option>
                        <option value="Dekat dengan tempat makan dan tempat ibadah">Dekat dengan tempat makan dan
                            tempat ibadah</option>
                        <option value="Dekat dengan tempat makan,tempat ibadah dan tempat hiburan">Dekat dengan
                            tempat makan,tempat ibadah dan tempat hiburan</option>
                        <option value="Dekat dengan tempat makan,warung,tempat ibadah dan tempat hiburan">Dekat
                            dengan tempat makan,warung,tempat ibadah dan tempat hiburan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keamanan">Keamanan</label>
                    <select class="form-control" id="keamanan" wire:model="keamanan" required>
                        <option value="Tidak ada keamanan">Tidak ada keamanan</option>
                        <option value="Satpam/penjaga">Satpam/penjaga</option>
                        <option value="CCTV">CCTV</option>
                        <option value="CCTV dan satpam/penjaga">CCTV dan satpam/penjaga</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ukuran_ruangan">Ukuran Ruangan</label>
                    <select class="form-control" id="ukuran_ruangan" wire:model="ukuran_ruangan" required>
                        <option value="3x3 M">3x3 M</option>
                        <option value="3x4 M">3x4 M</option>
                        <option value="4x5 M">4x5 M</option>
                        <option value="5x6 M">5x6 M</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="batas_jam_malam">Batas Jam Malam</label>
                    <select class="form-control" id="batas_jam_malam" wire:model="batas_jam_malam" required>
                        <option value="21:00-22:00">21:00-22:00</option>
                        <option value="23:00-24:00">23:00-24:00</option>
                        <option value="01:00-02:00">01:00-02:00</option>
                        <option value="Tidak ada batas jam malam">Tidak ada batas jam malam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_listrik">Jenis Listrik</label>
                    <select class="form-control" id="jenis_listrik" wire:model="jenis_listrik" required>
                        <option value="Pascabayar/bulanan">Pascabayar/bulanan</option>
                        <option value="Token/listrik isi ulang">Token/listrik isi ulang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kebersihan_kos">Kebersihan Kos</label>
                    <select class="form-control" id="kebersihan_kos" wire:model="kebersihan_kos" required>
                        <option value="Kamar dan kos tidak pernah dibersihkan">Kamar dan kos tidak pernah
                            dibersihkan</option>
                        <option value="Kamar tidak pernah dibersihkan tetapi kos dibersihkan">Kamar tidak pernah
                            dibersihkan tetapi kos dibersihkan</option>
                        <option value="Kamar dibersihkan tetapi kos tidak pernah dibersihkan">Kamar dibersihkan
                            tetapi kos tidak pernah dibersihkan</option>
                        <option value="Kamar dan kos dibersihkan secara berkala">Kamar dan kos dibersihkan secara
                            berkala</option>
                    </select>
                </div>
                <button wire.click="store()"type="submit" class="btn btn-primary">Tambah Data Kos</button>
            </form>
        </div>
    </div>
</div>
@endif

</div>
