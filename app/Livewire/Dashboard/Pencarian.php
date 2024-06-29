<?php

namespace App\Livewire\Dashboard;

use App\Models\datakos;
use App\Models\penilaian;
use Livewire\Component;

class Pencarian extends Component
{
    public $Datakos, $kodekos,$penilaian;
    public $nama_kos, $alamat, $jarak_kos, $biaya, $fasilitas, $lokasi_pendukung, $keamanan, $ukuran_ruangan, $batas_jam_malam, $jenis_listrik, $kebersihan_kos;

    public function mount()
    {
        $this->Datakos = datakos::all();
        $this->penilaian = penilaian::all();
    }

    public function render()
    {
        return view('livewire.dashboard.pencarian',[
            'Datakos' => $this->Datakos,
            'penilaian' => $this->penilaian,
         ]);
    }
}
