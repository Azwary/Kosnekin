<?php

namespace App\Livewire\Content;

use App\Models\batas_jam_malam;
use App\Models\biaya;
use App\Models\datakos as ModelsDatakos;
use App\Models\fasilitas;
use App\Models\jarak;
use App\Models\jenis_listrik;
use App\Models\keamanan;
use App\Models\kebersihan_kos;
use App\Models\lokasi_pendukung;
use App\Models\ukuran_ruangan;
use Livewire\Component;
use Illuminate\Support\Str;

class Datakos extends Component
{
    public $main = true;
    public $add = false;
    public $ubah = false;
    public $Datakos;
    public $nama_kos, $alamat, $jarak_kos, $biaya, $fasilitas, $lokasi_pendukung, $keamanan, $ukuran_ruangan, $batas_jam_malam, $jenis_listrik, $kebersihan_kos;
    public $jarak_kos_options, $biaya_options, $fasilitas_options, $lokasi_pendukung_options, $keamanan_options, $ukuran_ruangan_options, $batas_jam_malam_options, $jenis_listrik_options, $kebersihan_kos_options;

    protected $rules = [
        'nama_kos' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'jarak_kos' => 'required|string',
        'biaya' => 'required|string',
        'fasilitas' => 'required|string',
        'lokasi_pendukung' => 'required|string',
        'keamanan' => 'required|string',
        'ukuran_ruangan' => 'required|string',
        'batas_jam_malam' => 'required|string',
        'jenis_listrik' => 'required|string',
        'kebersihan_kos' => 'required|string',
    ];

    public function mount()
    {
        $this->Datakos = ModelsDatakos::all();
        $this->jarak_kos_options = jarak::all();
        $this->biaya_options = biaya::all();
        $this->lokasi_pendukung_options = lokasi_pendukung::all();
        $this->keamanan_options = keamanan::all();
        $this->ukuran_ruangan_options = ukuran_ruangan::all();
        $this->fasilitas_options = fasilitas::all();
        $this->batas_jam_malam_options = batas_jam_malam::all();
        $this->jenis_listrik_options = jenis_listrik::all();
        $this->kebersihan_kos_options = kebersihan_kos::all();
    }

    public function render()
    {
        return view('livewire.content.datakos', [
            'Datakos' => $this->Datakos,
            'jarak_kos_options' => $this->jarak_kos_options,
            'biaya_options' => $this->biaya_options,
            'lokasi_pendukung_options' => $this->lokasi_pendukung_options,
            'keamanan_options' => $this->keamanan_options,
            'ukuran_ruangan_options' => $this->ukuran_ruangan_options,
            'fasilitas_options' => $this->fasilitas_options,
            'batas_jam_malam_options' => $this->batas_jam_malam_options,
            'jenis_listrik_options' => $this->jenis_listrik_options,
            'kebersihan_kos_options' => $this->kebersihan_kos_options,
        ]);
    }

    public function home()
    {
        $this->main = true;
        $this->add = false;
        $this->ubah = false;
    }

    public function create()
    {
        $this->main = false;
        $this->add = true;
    }

    public function store()
    {
        $this->validate();

        ModelsDatakos::create([
            'nama_kos' => $this->nama_kos,
            'alamat' => $this->alamat,
            'jarak_kos' => $this->jarak_kos,
            'biaya' => $this->biaya,
            'lokasi_pendukung' => $this->lokasi_pendukung,
            'keamanan' => $this->keamanan,
            'ukuran_ruangan' => $this->ukuran_ruangan,
            'fasilitas' => $this->fasilitas,
            'batas_jam_malam' => $this->batas_jam_malam,
            'jenis_listrik' => $this->jenis_listrik,
            'kebersihan_kos' => $this->kebersihan_kos,
            'application_sent' => now(),
        ]);

        session()->flash('message', 'User created successfully.');

        return redirect()->to('datakos');
    }
}
