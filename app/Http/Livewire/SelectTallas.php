<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Talla;

class SelectTallas extends Component
{
    public $selectedTallas;
    
    public function render()
    {
        $tallas = Talla::all();
        return view('livewire.select-tallas',compact('tallas'));
    }
}
