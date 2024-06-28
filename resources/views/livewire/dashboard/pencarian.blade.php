<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekomendasi Kos</h1>
    </div>

    <!-- Content Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($Datakos as $item)
            <div class="flex justify-center">
                <div class="relative card w-full max-w-sm rounded-lg overflow-hidden shadow-lg m-4 transform transition-transform duration-300 hover:scale-105">
                    <div class="ribbon bg-blue-500 bg-opacity-75 text-white py-1 px-3 absolute top-0 left-0 shadow-lg">
                        <span>Rekomendasi 1</span>
                    </div>
                    <img src="{{ asset($item->image) }}" class="card-img-top w-full h-48 object-cover" alt="Image of {{ $item->nama_kos }}">
                    <div class="card-divider h-1 bg-gray-300 mt-4"></div> <!-- Divider line -->
                    <div class="card-body p-4">
                        <h5 class="card-title text-xl font-bold mb-2 text-blue-800">{{ $item->nama_kos }}</h5>
                        <p class="card-text mb-2"><b>Alamat:</b> <br>{{ $item->alamat }}</p>
                        {{-- <p class="card-text mb-2"><b>Biaya (bulan):</b> Rp {{ number_format((int)$item->biaya, 0, ',', '.') }}</p> --}}
                        <p class="card-text mb-2"><b>Biaya (bulan):</b> <br> Rp {{ $item->biaya }}</p>
                        <p class="card-text mb-2"><b>Keamanan:</b> <br> {{ $item->keamanan }}</p>
                        <p class="card-text mb-2"><b>Ukuran ruangan:</b> <br> {{ $item->ukuran_ruangan }}</p>
                        <p class="card-text mb-2"><b>Fasilitas:</b> <br> {{ $item->fasilitas }}</p>
                        <p class="card-text mb-2"><b>Batas jam malam:</b> <br> {{ $item->batas_jam_malam }}</p>
                        <p class="card-text mb-2"><b>Jenis listrik:</b> <br> {{ $item->jenis_listrik }}</p>
                        <p class="card-text"><b>Kebersihan:</b> <br> {{ $item->kebersihan_kos }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- End of Content Row -->
</div>
