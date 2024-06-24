<?php

namespace App\Livewire\Content;

use App\Models\datakos as ModelsDatakos;
use Livewire\Component;
use Illuminate\Support\Str;

class Datakos extends Component
{
    public $main = true;
    public $add = false;

    public $nama_kos;
    public $jarak_kos;
    public $biaya;
    public $fasilitas;
    public $lokasi_pendukung;
    public $keamanan;
    public $ukuran_ruangan;
    public $batas_jam_malam;
    public $jenis_listrik;
    public $kebersihan_kos;

    protected $rules = [
        'nama_kos' => 'required|string|max:255',
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


    public function render()
    {
        return view('livewire.content.datakos');
    }

    public function Home()
    {
        $this->main = true;
        $this->add = false;
    }

    public function create()
    {
        $this->main = false;
        $this->add = true;
    }

    public function store()
    {
        // Temukan opportunity berdasarkan id yang disimpan di properti
        //$opportunity = ModelsDatakos::findOrFail($this->opportunity_id);

        $this->validate();

        // Buat new applicant
        ModelsDatakos::create([
            // 'id' => Str::uuid(),
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


        // Set session flash message
        session()->flash('message', 'User created successfully.');

        // Redirect ke halaman applicants
        return redirect()->to('datakos');
    }
}
