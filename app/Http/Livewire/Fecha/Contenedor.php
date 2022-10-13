<?php

namespace App\Http\Livewire\Fecha;

use Livewire\Component;

class Contenedor extends Component
{
    public $daterange;


    public function render()
    {

        return view('livewire.fecha.contenedor');
    }

    public function filtrar()
    {
       echo $this->daterange;
      
    }
}
