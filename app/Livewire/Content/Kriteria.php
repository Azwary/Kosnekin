<?php

namespace App\Livewire\Content;

use App\Models\kriteria as ModelsKriteria;
use Livewire\Component;
use Illuminate\Support\Str;

class Kriteria extends Component
{

    public $main = true;
    public $add = false;
    public $addsub = false;

    public $kode_kriteria;
    public $nama_kriteria;
    public $jenis_kriteria;
    public $bobot_kriteria;

    protected $rules = [
        'kode_kriteria' => 'required|string|max:255',
        'nama_kriteria' => 'required|string|max:255',
        'jenis_kriteria' => 'required|string',
        'bobot_kriteria' => 'required|numeric',
    ];

    
    public function render()
    {
        return view('livewire.content.kriteria');
    }

    public function Home()
    {
        $this->main = true;
        $this->add = false;
        $this->addsub = false;
    }

    public function create()
    {
        $this->main = false;
        $this->add = true;
        $this->addsub = false;
    }

    public function createsub()
    {
        $this->main = false;
        $this->add = false;
        $this->addsub = true;
    }

    public function store()
    {
        $this->validate();

        Kriteria::create([
            'id' => Str::uuid(),
            'nama_kriteria' => $this->nama_kriteria,
            'jenis' => $this->jenis,
            'bobot' => $this->bobot,
            'application_sent' => now(),
        ]);


        // Set session flash message
        session()->flash('message', 'User created successfully.');
        $this->reset();

        // Redirect ke halaman applicants
        return redirect()->to('/kriteria');
    }
}
