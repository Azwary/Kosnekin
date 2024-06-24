<?php

namespace App\Livewire\Content;

use App\Models\jenis;
use App\Models\Kriteria as ModelsKriteria;
use Livewire\Component;
use Illuminate\Support\Str;

class Kriteria extends Component
{
    public $main = true;
    public $add = false;
    public $ubah = false;

    public $kriteriaa, $kode_kriteria, $nama_kriteria,  $jenis, $bobot;
    public $nama_jenis;

    public function mount()
    {
        $this->kriteriaa = ModelsKriteria::all();
        $this->nama_jenis = jenis::all();
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
        ]);
    }

    public function Home()
    {
        $this->main = true;
        $this->add = false;
        $this->ubah = false;
    }

    public function create()
    {
        $this->main = false;
        $this->ubah = false;
        $this->add = true;
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

        // Get the last record to determine the last used ID
        $lastKriteria = ModelsKriteria::orderBy('id', 'desc')->first();
        if ($lastKriteria) {
            // Extract the numeric part of the last ID and increment it
            $lastIdNumber = (int)substr($lastKriteria->id, 1);
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
