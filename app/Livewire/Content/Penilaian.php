<?php

namespace App\Livewire\Content;

use App\Models\datakos;
use App\Models\kriteria;
use App\Models\penilaian as ModelsPenilaian;
use Livewire\Component;

class Penilaian extends Component
{
    public $main = true;
    public $add = false;
    public $penilaian, $datakos, $kriteria;
    public $kodekos;

    public function mount()
    {
        // Fetch data and eager load relationships
        $this->datakos = Datakos::with([
            'jarak',
            'biaya',
            'fasilitas',
            'lokasiPendukung',
            'keamanan',
            'ukuranRuangan',
            'batasJamMalam',
            'jenisListrik',
            'kebersihanKos'
        ])->get();

        // Fetch kriteria and existing penilaian
        $this->kriteria = Kriteria::all();
        $this->penilaian = ModelsPenilaian::all();
    }

    public function render()
    {
        // Pass data to the Livewire view
        return view('livewire.content.penilaian', [
            'datakos' => $this->datakos,
            'kriteria' => $this->kriteria,
            'penilaian' => $this->penilaian
        ]);
    }

    public function home()
    {
        // Switch between main and add views
        $this->main = true;
        $this->add = false;
    }

    public function create()
    {
        // Switch between main and add views
        $this->main = false;
        $this->add = true;
    }
}
