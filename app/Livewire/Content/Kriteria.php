<?php

namespace App\Livewire\Content;

use App\Models\batas_jam_malam;
use App\Models\biaya;
use App\Models\fasilitas;
use App\Models\jarak;
use App\Models\jenis;
use App\Models\jenis_listrik;
use App\Models\keamanan;
use App\Models\kebersihan_kos;
use App\Models\Kriteria as ModelsKriteria;
use App\Models\lokasi_pendukung;
use App\Models\ukuran_ruangan;
use Livewire\Component;
use Illuminate\Support\Str;

class Kriteria extends Component
{
    public $main = true;
    public $add = false;
    public $ubah = false;
    public $mainsub = false;
    public $addsub = false;

    public $kriteriaa, $kode_kriteria, $nama_kriteria,  $jenis, $bobot;
    public $nama_jenis;
    public $nama_subkriteria,$bobot_subkriteria;
    public $jarak_kos_options, $biaya_options, $fasilitas_options, $lokasi_pendukung_options, $keamanan_options, $ukuran_ruangan_options, $batas_jam_malam_options, $jenis_listrik_options, $kebersihan_kos_options;

    public function mount()
    {
        $this->kriteriaa = ModelsKriteria::all();
        $this->nama_jenis = jenis::all();

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
    protected $rules = [
        'nama_kriteria' => 'required|string|max:255',
        'jenis' => 'required|string',
        'bobot' => 'required|numeric|min:0|max:5',
    ];

    public function render()
    {
        return view('livewire.content.kriteria', [
            'kriteriaa' => $this->kriteriaa,
            'nama_jenis' => $this->nama_jenis,
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

    public function Home()
    {
        $this->main = true;
        $this->add = false;
        $this->ubah = false;
        $this->mainsub = false;
        $this->addsub = false;
    }

    public function create()
    {
        $this->main = false;
        $this->ubah = false;
        $this->add = true;
        $this->mainsub = false;
        $this->addsub = false;
    }

    public function homesub($id)
    {
        $this->main = false;
        $this->add = false;
        $this->mainsub = true;
        $this->addsub = false;

        $kriteriaa = ModelsKriteria::findOrFail($id);
        $this->kode_kriteria = $kriteriaa->id;
        $this->bobot = $kriteriaa->bobot;
        $this->nama_kriteria = $kriteriaa->nama_kriteria;
        $this->jenis = $kriteriaa->jenis;
        if ($this->kode_kriteria == 'C01') {
            // $jarak = jarak::all();
            // $this->nama_subkriteria = $jarak->nama;
            // $this->bobot_subkriteria = $jarak->bobot;
        } elseif ($this->kode_kriteria == 'C02') {

        } elseif ($this->kode_kriteria == 'C03') {

        } elseif ($this->kode_kriteria == 'C04') {

        } elseif ($this->kode_kriteria == 'C05') {

        } elseif ($this->kode_kriteria == 'C06') {

        } elseif ($this->kode_kriteria == 'C07') {

        } elseif ($this->kode_kriteria == 'C08') {

        } elseif ($this->kode_kriteria == 'C09') {

        }

    }

    public function createsub($kode_kriteria)
    {
        $this->main = false;
        $this->add = false;
        $this->mainsub = false;
        $this->addsub = true;

        $kriteriaa = ModelsKriteria::findOrFail($kode_kriteria);
        $this->kode_kriteria = $kriteriaa->id;


    }
    public function storesub($kode_kriteria)
    {
        $kriteriaa = ModelsKriteria::findOrFail($kode_kriteria);
        $this->kode_kriteria = $kriteriaa->id;

        $validatedData = $this->validate([
            'nama_subkriteria' => 'required|string|max:255',
            'bobot_subkriteria' => 'required',
        ]);
        $data = [
            'nama' => $this->nama_subkriteria,
            'bobot' => $this->bobot_subkriteria,
        ];

        if ($this->kode_kriteria == 'C01') {
            Jarak::create($data);
        } elseif ($this->kode_kriteria == 'C02') {
            Biaya::create($data);
        } elseif ($this->kode_kriteria == 'C03') {
            fasilitas::create($data);
        } elseif ($this->kode_kriteria == 'C04') {
            lokasi_pendukung::create($data);
        } elseif ($this->kode_kriteria == 'C05') {
            keamanan::create($data);
        } elseif ($this->kode_kriteria == 'C06') {
            ukuran_ruangan::create($data);
        } elseif ($this->kode_kriteria == 'C07') {
            batas_jam_malam::create($data);
        } elseif ($this->kode_kriteria == 'C08') {
            jenis_listrik::create($data);
        } elseif ($this->kode_kriteria == 'C09') {
            kebersihan_kos::create($data);
        }
        // dd($data);
        $this->resetInputFields();
        session()->flash('message', 'Kriteria created successfully.');
        $this->reset();

        return redirect()->to('/kriteria');
    }

    public function Edit($id)
    {
        $this->main = false;
        // $this->add = true;
        $this->ubah = true;
        $kriteriaa = ModelsKriteria::findOrFail($id);

        // Populate form fields with existing data
        $this->kode_kriteria = $kriteriaa->id;
        $this->nama_kriteria = $kriteriaa->nama_kriteria;
        $this->jenis = $kriteriaa->jenis;
        $this->bobot = $kriteriaa->bobot;
    }
    private function resetInputFields()
    {
        $this->kode_kriteria = '';
        $this->nama_kriteria = '';
        $this->jenis = '';
        $this->bobot = '';
    }

    public function store()
    {
        $this->validate();

        // Generate new ID
        $lastKriteria = ModelsKriteria::withTrashed()->max('id');
        if ($lastKriteria) {
            // Extract the numeric part of the last ID and increment it
            $lastIdNumber = (int) substr($lastKriteria, 1);
            $newIdNumber = $lastIdNumber + 1;
        } else {
            // If no record exists, start with 01
            $newIdNumber = 1;
        }

        // Format the new ID to have a two-digit number
        $newId = 'C' . str_pad($newIdNumber, 2, '0', STR_PAD_LEFT);

        $data = [
            'id' => $newId,
            'nama_kriteria' => $this->nama_kriteria,
            'jenis' => $this->jenis,
            'bobot' => $this->bobot,
        ];

        // Use dd() to dump and die to see if the data is correct
        // dd($data);

        ModelsKriteria::create($data);
        $this->resetInputFields();
        session()->flash('message', 'Kriteria created successfully.');
        $this->reset();

        return redirect()->to('/kriteria');
    }
    public function update()
    {
        $validatedData = $this->validate([
            'nama_kriteria' => 'required|string|max:255',
            'jenis' => 'required|string',
            'bobot' => 'required|numeric|min:0|max:5',
        ]);

        $kriteriaa = ModelsKriteria::findOrFail($this->kode_kriteria);
        $kriteriaa->update($validatedData);

        session()->flash('message', 'kriteria updated successfully.');

        $this->resetInputFields();
        return redirect()->to('/kriteria');
    }

    public function cancel()
    {
        $this->resetInputFields();
        return redirect()->to('/kriteria');
    }
    public function delete($id)
    {
        $kriteriaa = ModelsKriteria::findOrFail($id);
        $kriteriaa->delete();
        session()->flash('message', 'kriteria deleted successfully.');
        return redirect()->to('/kriteria');
    }
}
