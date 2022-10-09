<?php

namespace App\Http\Livewire;

use App\Models\Consulting;
use Livewire\Component;

class ListConsoltion extends Component
{
    
    public $consls;

    public function mount()
    {
        $this->consls = Consulting::query()
            ->orderByDesc('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.list-consoltion');
    }
}
