<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MasiaPhotoShow extends Component
{
    public $photos;
    public $paths = [];

    public function mount(){

        $this->photos = Storage::allFiles('public/masia');

        foreach ($this->photos as $photo ){
            date_default_timezone_set('Europe/Madrid');
            $time = Storage::lastModified($photo);

            $formatted = date("D, j F Y h:i:s A", $time);
            $photo = Str::substr($photo, 7);
            $object = (object) [
                'photo' => $photo,
                'time' => $formatted,
              ];
            array_push($this->paths, $object);
        }

        usort($this->paths, $this->sortBy('time', 'DESC'));

    }

    public function sortBy( $clave, $orden = null ){
        return function ($a, $b) use ( $clave, $orden) {
            $result=  ($orden=="DESC") ? strnatcmp($b->$clave, $a->$clave) :  strnatcmp($a->$clave, $b->$clave);
            return $result;
      };
    }

    public function render()
    {
        return view('livewire.masia-photo-show', [
            'paths' => $this->paths,
        ]);
    }
}
