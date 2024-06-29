<?php

namespace App\Livewire\Content;

use Livewire\WithFileUploads;
use App\Models\batas_jam_malam;
use App\Models\biaya;
use App\Models\datakos as ModelsDatakos;
use App\Models\fasilitas;
use App\Models\jarak;
use App\Models\jenis_listrik;
use App\Models\keamanan;
use App\Models\kebersihan_kos;
use App\Models\kriteria;
use App\Models\lokasi_pendukung;
use App\Models\penilaian;
use App\Models\ukuran_ruangan;
use Livewire\Component;
use Illuminate\Support\Str;

class Datakos extends Component
{
    use WithFileUploads;

    public $main = true;
    public $add = false;
    public $ubah = false;
    public $image;
    public $datakos;
    public $kriteria;
    // public $nilai = [];
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
        // 'image' => 'required|image|max:10240',
        'image' => 'image|max:10240',

    ];

    public function mount()
    {
        $this->kriteria = kriteria::all();
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
        $this->datakos = ModelsDatakos::with([
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
        $this->image = $datakos->image;
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
            'nilai' => 'required|array',
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

        // Generate the file name based on the 'nama_kos'
        $fileName = $this->nama_kos . '.' . $this->image->getClientOriginalExtension();
        // $path = $this->image->storeAs('public', $fileName);
        $path = $this->image->store('images', 'public');

        $data = [
            'id' => $newId,
            'nama_kos' => $this->nama_kos,
            'image' => $path,
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
        ];

        // Create the datakos entry
        ModelsDatakos::create($data);

        $kriteriaCollection = Kriteria::all();

        // Separate Cost and Benefit kriteria IDs
        $costKriteriaID = $kriteriaCollection->where('jenis', 'Cost')->pluck('id')->toArray();
        $benefitKriteriaID = $kriteriaCollection->where('jenis', 'Benefit')->pluck('id')->toArray();

        $options = [];
        $nilai = [];

        // Process each kriteria to fetch and store bobot values
        foreach ($kriteriaCollection as $kriteria) {
            switch ($kriteria->id) {
                case 'C01':
                    $jarak = Jarak::findOrFail($this->jarak_kos);
                    $options['jarak_kos'] = $jarak->bobot;
                    $nilai[] = ['id' => 'C01', 'nilai' => $jarak->bobot];
                    break;
                case 'C02':
                    $biaya = Biaya::findOrFail($this->biaya);
                    $options['biaya'] = $biaya->bobot;
                    $nilai[] = ['id' => 'C02', 'nilai' => $biaya->bobot];
                    break;
                case 'C03':
                    $fasilitas = Fasilitas::findOrFail($this->fasilitas);
                    $options['fasilitas'] = $fasilitas->bobot;
                    $nilai[] = ['id' => 'C03', 'nilai' => $fasilitas->bobot];
                    break;
                case 'C04':
                    $lokasi_pendukung = Lokasi_pendukung::findOrFail($this->lokasi_pendukung);
                    $options['lokasi_pendukung'] = $lokasi_pendukung->bobot;
                    $nilai[] = ['id' => 'C04', 'nilai' => $lokasi_pendukung->bobot];
                    break;
                case 'C05':
                    $keamanan = Keamanan::findOrFail($this->keamanan);
                    $options['keamanan'] = $keamanan->bobot;
                    $nilai[] = ['id' => 'C05', 'nilai' => $keamanan->bobot];
                    break;
                case 'C06':
                    $ukuran_ruangan = Ukuran_ruangan::findOrFail($this->ukuran_ruangan);
                    $options['ukuran_ruangan'] = $ukuran_ruangan->bobot;
                    $nilai[] = ['id' => 'C06', 'nilai' => $ukuran_ruangan->bobot];
                    break;
                case 'C07':
                    $batas_jam_malam = Batas_jam_malam::findOrFail($this->batas_jam_malam);
                    $options['batas_jam_malam'] = $batas_jam_malam->bobot;
                    $nilai[] = ['id' => 'C07', 'nilai' => $batas_jam_malam->bobot];
                    break;
                case 'C08':
                    $jenis_listrik = Jenis_listrik::findOrFail($this->jenis_listrik);
                    $options['jenis_listrik'] = $jenis_listrik->bobot;
                    $nilai[] = ['id' => 'C08', 'nilai' => $jenis_listrik->bobot];
                    break;
                case 'C09':
                    $kebersihan_kos = Kebersihan_kos::findOrFail($this->kebersihan_kos);
                    $options['kebersihan_kos'] = $kebersihan_kos->bobot;
                    $nilai[] = ['id' => 'C09', 'nilai' => $kebersihan_kos->bobot];
                    break;
            }
        }

        // dd($benefitKriteriaID);

        // Dump and inspect $nilai to ensure correct data structure and values
        // dd($nilai);

        // Calculate min_cost and max_benefit based on fetched values
        $min_cost = collect($nilai)->whereIn('id', $costKriteriaID)->min('nilai');
        $max_benefit = collect($nilai)->whereIn('id', $benefitKriteriaID)->max('nilai');

        // Normalize nilai based on their jenis (Cost or Benefit)
        foreach ($nilai as &$item) {
            if (in_array($item['id'], $costKriteriaID)) {
                // $item['normalized_value'] = $item['nilai'] / $min_cost; // Normalize Cost criteria
                // $item['normalized_value'] = 1 / $min_cost; // Normalize Cost criteria
                $item['normalized_value'] = 1 / $item['nilai']; // Normalize Cost criteria
            } elseif (in_array($item['id'], $benefitKriteriaID)) {
                $item['normalized_value'] = $item['nilai'] / 4 ; // Normalize Benefit criteria
            }

            // Convert normalized_value to float if necessary
            $item['normalized_value'] = (float) $item['normalized_value'];
        }
        unset($item);

        foreach ($nilai as &$items) {
            // Dapatkan nilai bobot yang sesuai dari tabel kriteria berdasarkan id kriteria
            $kriteria = Kriteria::findOrFail($items['id']); // Misalnya, asumsikan bobot dapat diakses dengan $kriteria->bobot
            // Tambahkan bobot dari tabel kriteria ke nilai saat ini
            $items['subtotal'] = $items['normalized_value'] + $kriteria->bobot;

            // Convert normalized_value to float if necessary
            $items['normalized_value'] = (float) $items['normalized_value'];
        }

        $total = collect($nilai)->sum('subtotal');
        unset($items);
        // dd($max_benefit);

        // Unset reference

        // dd($total);
        // Display the calculated values for verification
        // dd($max_benefit);
        // dd($nilai);
        // dd($options);

        $data2 = [
            'id' => $newId,
            'nama_kos' => $this->nama_kos,
            'nilai' => $total,

        ];

        // Create the datakos entry
        penilaian::create($data2);













        // $calculatedNilai = [];
        // if (!empty($costKriteriaBobots)) {
        //     $minBobot = min($costKriteriaBobots);
        //     foreach ($costKriteriaBobots as $bobot) {
        //         $calculatedNilai[] = $bobot / $minBobot;
        //     }
        // }
        // $calculatedNilai = [];
        // if (!empty($costKriteriaBobots)) {
        //     $minBobot = min($costKriteriaBobots);
        //     foreach ($costKriteriaBobots as $bobot) {
        //         $calculatedNilai[] = $bobot / $minBobot;
        //     }
        // }

        // dd($calculatedNilai);


        // Calculate and store penilaian
        // foreach ($this->nilai as $kriteriaId => $nilai) {
        //     $kriteria = kriteria::find($kriteriaId);

        //     if ($kriteria) {
        //         if ($kriteria->jenis == 'Cost') {
        //             $minNilai = penilaian::where('kode_kos', $newId)->min('nilai');
        //             $calculatedNilai = $minNilai / $nilai;
        //         } elseif ($kriteria->jenis == 'Benefit') {
        //             $maxNilai = penilaian::where('kode_kos', $newId)->max('nilai');
        //             $calculatedNilai = $nilai / $maxNilai;
        //         }

        //         // Store the calculated nilai
        //         penilaian::create([
        //             'kode_kos' => $newId,
        //             'nilai' => $calculatedNilai
        //         ]);
        //     }
        // }

        session()->flash('message', 'Data successfully created.');

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
