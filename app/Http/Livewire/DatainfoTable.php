<?php

namespace App\Http\Livewire;

use App\Models\Datainfo;
use App\Models\Datainfomongo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DatainfoTable extends Component
{
    use WithPagination;

    protected $queryString = [
        'searchName'        => ['except' => ''],
        'searchLast'        => ['except' => ''],
        'searchLocation'    => ['except' => ''],
        'searchCity'        => ['except' => ''],
        'searchGender'      => ['except' => ''],
        'searchCivil'       => ['except' => ''],
        'perPage'
    ];

    public $searchName = '';
    public $searchLast = '';
    public $searchLocation = '';
    public $searchCity = '';
    public $searchGender = '';
    public $searchCivil = '';
    public $perPage = 5;
    public $isMongo = false;

    public function render()
    {
        $this->isMongo = env('MONGO_ENABLED', false);
        // dd($this->isMongo);
        if ($this->isMongo) {
            $data = DB::connection('mongodb')
                ->collection('fb-data')
                ->orwhere('nombre','regexp',"/.*$this->searchName/i")
                ->orwhere('apellido','regexp',"/.*$this->searchLast/i")
                ->orwhere('ubicacion','regexp',"/.*$this->searchLocation/i")
                ->orwhere('ciudad','regexp',"/.*$this->searchCity/i")
                ->orwhere('genero','regexp',"/.*$this->searchGender/i")
                ->orwhere('civil','regexp',"/.*$this->searchCivil/i")
                ->limit($this->perPage)->get();
        } else {
            $data = Datainfo::when(strlen($this->searchName) > 0, function ($q) {
                    return $q->where('nombre', 'LIKE', "%{$this->searchName}%");
                })
                ->when(strlen($this->searchLast) > 0, function ($q) {
                    return $q->where('apellido', 'LIKE', "%{$this->searchLast}%");
                })
                ->when(strlen($this->searchLocation) > 0, function ($q) {
                    return $q->where('ubicacion', 'LIKE', "%{$this->searchLocation}%");
                })
                ->when(strlen($this->searchCity) > 0, function ($q) {
                    return $q->where('ciudad', 'LIKE', "%{$this->searchCity}%");
                })
                ->when(strlen($this->searchGender) > 0, function ($q) {
                    return $q->where('genero', $this->searchGender);
                })
                ->when(strlen($this->searchCivil) > 0, function ($q) {
                    return $q->where('civil', $this->searchCivil);
                })
                ->limit($this->perPage)->get();
        }

        return view('livewire.datainfo-table', [
            'data' => $data
        ])->layout('layouts.app');
    }

    public function clear()
    {
        $this->searchName = '';
        $this->searchLast = '';
        $this->searchLocation = '';
        $this->searchCity = '';
        $this->searchGender = '';
        $this->searchCivil = '';
        $this->page = 1;
        $this->perPage = 5;
    }
}
