<?php

namespace App\Livewire\Content;

use App\Models\datakos;
use Livewire\Component;

class Penilaian extends Component
{
    public $Datakos;

    public function mount()
    {
        $this->Datakos = datakos::all();
    }
    public function render()
    {
        return view('livewire.content.penilaian',[
            'Datakos' => $this->Datakos,
        ]);
    }
}
