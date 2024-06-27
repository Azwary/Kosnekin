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
    public $Datakos, $kodekos;
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

    public function Edit($id)
    {
        $this->main = false;
        $this->ubah = true;
        $datakos = ModelsDatakos::findOrFail($id);
        $this->kodekos = $datakos->id;
        $this->nama_kos = $datakos->nama_kos;
        $this->alamat = $datakos->alamat;
        $this->jarak_kos = $datakos->jarak_kos;
        $this->biaya = $datakos->biaya;
        $this->fasilitas = $datakos->fasilitas;
        $this->lokasi_pendukung = $datakos->lokasi_pendukung;
        $this->keamanan = $datakos->keamanan;
        $this->ukuran_ruangan = $datakos->ukuran_ruangan;
        $this->batas_jam_malam = $datakos->batas_jam_malam;
        $this->jenis_listrik = $datakos->jenis_listrik;
        $this->kebersihan_kos = $datakos->kebersihan_kos;
    }
    public function update()
    {
        $validatedData = $this->validate([
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
        ]);

        $datakos = ModelsDatakos::findOrFail($this->kodekos);
        $datakos->update($validatedData);

        session()->flash('message', 'kriteria updated successfully.');

        // $this->resetInputFields();
        return redirect()->to('/datakos');
    }

    public function store()
    {
        $this->validate();

        // Generate new ID
        $lastKriteria = ModelsDatakos::withTrashed()->max('id');
        if ($lastKriteria) {
            // Extract the numeric part of the last ID and increment it
            $lastIdNumber = (int) substr($lastKriteria, 1);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            // If no record exists, start with 01
            $newIdNumber = 1;
        }

        // Format the new ID to have a two-digit number
        $newId = 'A' . str_pad($newIdNumber, 2, '0', STR_PAD_LEFT);

        $data = [
            'id' => $newId,
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
        ];

        // Use dd() to dump and die to see if the data is correct
        // dd($data);

        ModelsDatakos::create($data);

        session()->flash('message', 'User created successfully.');

        return redirect()->to('datakos');
    }
    public function delete($id)
    {
        $kriteriaa = ModelsDatakos::findOrFail($id);
        $kriteriaa->delete();
        session()->flash('message', 'kriteria deleted successfully.');
        return redirect()->to('/datakos');
    }
}
