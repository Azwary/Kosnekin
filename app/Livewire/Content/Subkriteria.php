<?php

namespace App\Livewire\Content;

use App\Models\Subkriteria as ModelssubKriteria;
use Livewire\Component;
use Illuminate\Support\Str;

class Subkriteria extends Component
{

    public $main = true;
    public $add = false;

    public $nama_kriteria;
    public $bobot_kriteria;

    protected $rules = [
        'nama_kriteria' => 'required|string|max:255',
        'bobot' => 'required|decimal',
    ];

    public function render()
    {
        return view('livewire.content.subkriteria');
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
        $this->validate();

        Subkriteria::create([
            'id' => Str::uuid(),
            'nama_subkriteria' => $this->nama_subkriteria,
            'bobot' => $this->bobot,
            'application_sent' => now(),
        ]);


        // Set session flash message
        session()->flash('message', 'User created successfully.');
        $this->reset();

        // Redirect ke halaman applicants
        return redirect()->to('/subkriteria');
    }
}
