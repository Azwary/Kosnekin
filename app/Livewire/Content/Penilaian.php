<?php

namespace App\Livewire\Content;

use App\Models\datakos;
use App\Models\kriteria;
use App\Models\penilaian as ModelsPenilaian;
use Livewire\Component;

class Penilaian extends Component
{
    public $main = true;
    public $datakos;
    public $penilaian;

    public function mount()
    {
        $this->penilaian = ModelsPenilaian::all();
        $this->datakos = datakos::with([
            'jarak',
            'biayaa',
            'fasilitass',
            'lokasiPendukung',
            'keamanann',
            'ukuranRuangan',
            'batasJamMalam',
            'jenisListrik',
            'kebersihanKos'
        ])->get();
    }

    public function render()
    {
        return view('livewire.content.penilaian', [
            'penilaian' => $this->penilaian,
        ]);
    }

    // public function calculateTotal($datakos)
    // {
    //     $total = 0;
    //     $total += $this->calculateNormalizedValue($datakos->biayaa);
    //     $total += $this->calculateNormalizedValue($datakos->fasilitass);
    //     $total += $this->calculateNormalizedValue($datakos->lokasiPendukung);
    //     $total += $this->calculateNormalizedValue($datakos->keamanann);
    //     $total += $this->calculateNormalizedValue($datakos->ukuranRuangan);
    //     $total += $this->calculateNormalizedValue($datakos->batasJamMalam);
    //     $total += $this->calculateNormalizedValue($datakos->jenisListrik);
    //     $total += $this->calculateNormalizedValue($datakos->kebersihanKos);

    //     return $total;
    // }

    // private function calculateNormalizedValue($relation)
    // {
    //     $kriteria = kriteria::all();

    //     // foreach ($kriteria as $kriteria) {
    //         if ($kriteria->jenis == 'Cost') {
    //             $minNilai = penilaian::where('kode_kos', $newId)->min('nilai');
    //             $calculatedNilai = $minNilai / $nilai; // Assuming $nilai is defined somewhere
    //         } elseif ($kriteria->jenis == 'Benefit') {
    //             $maxNilai = penilaian::where('kode_kos', $newId)->max('nilai');
    //             $calculatedNilai = $nilai / $maxNilai; // Assuming $nilai is defined somewhere
    //         }
    //         // Perform further operations with $calculatedNilai here
    //     }


    //     if ($relation && isset($relation->bobot)) {
    //         // Ensure bobot is at least 1 to avoid division by zero
    //         $bobot = max(1, $relation->bobot);
    //         return 1 / $bobot; // Divide 1 by bobot to normalize
    //     } else {
    //         return 0; // Default to 0 if bobot is not set or relation doesn't exist
    //     }
    // }
}
