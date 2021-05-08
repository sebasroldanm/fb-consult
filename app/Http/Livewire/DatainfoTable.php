<?php

namespace App\Http\Livewire;

use App\Models\Datainfo;
use Livewire\Component;
use Livewire\WithPagination;

class DatainfoTable extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.datainfo-table', [
            'data' => Datainfo::paginate(9)
        ])->layout('layouts.app');
    }
}
