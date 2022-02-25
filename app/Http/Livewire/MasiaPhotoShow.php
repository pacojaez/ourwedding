<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MasiaPhotoShow extends Component
{

    /**
     * Variable to get all the files from the file system
     *
     * @var array
     */
    public array $photos;

    /**
     * Array that get all the paths of of the photos to iterate it in the view
     *
     * @var array
     */
    public array $paths = [];

    /**
     * Retrieve all the photos in the folder,
     * generate an object adding the last datetime the photo has been modified,
     * generate the path for everyone
     * and sorts the resultant array
     *
     * @return void
     */
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

    /**
     * Sort by $clave, ordered by $orden
     *
     * @param [type] $clave
     * @param [type] $orden
     * @return callable
     */
    public function sortBy( $clave, $orden = null ){
        return function ($a, $b) use ( $clave, $orden) {
            $result=  ($orden=="DESC") ? strnatcmp($b->$clave, $a->$clave) :  strnatcmp($a->$clave, $b->$clave);
            return $result;
      };
    }

    /**
     * renders the view with the paths to all the photos in the fyle system
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.masia-photo-show', [
            'paths' => $this->paths,
        ]);
    }
}
