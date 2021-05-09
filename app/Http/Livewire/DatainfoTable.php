<?php

namespace App\Http\Livewire;

use App\Models\Datainfo;
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

    public function render()
    {
        return view('livewire.datainfo-table', [
            'data' => Datainfo::where('nombre', 'LIKE', "%{$this->searchName}%")
                ->where('apellido', 'LIKE', "%{$this->searchLast}%")
                ->where('ubicacion', 'LIKE', "%{$this->searchLocation}%")
                ->where('ciudad', 'LIKE', "%{$this->searchCity}%")
                ->where('genero', $this->searchGender)
                ->where('civil', $this->searchCivil)
                ->paginate($this->perPage)
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
