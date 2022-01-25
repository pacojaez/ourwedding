<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Photo;

class PhotoShow extends Component
{
    protected $photos;
    protected $paths = [];
    public $classes;

    public $totalRecords;
    public $perPage = 10;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount(){

        // $this->photos = Storage::allFiles('public/photos');

        // foreach ($this->photos as $photo ){

        //     date_default_timezone_set('Europe/Madrid');
        //     $time = Storage::lastModified($photo);

        //     $formatted = date("D, d M Y h:i:s A", $time);
        //     $photo = Str::substr($photo, 7);
        //     $object = (object) [
        //         'photo' => $photo,
        //         'time' => $formatted,
        //         'unix_time' => $time
        //       ];
        //     array_push($this->paths, $object);
        // }

        // usort($this->paths, $this->sortBy('unix_time', 'DESC'));

        $this->photos = Photo::all();

    }

    public function sortBy( $clave, $orden = null ){
        return function ($a, $b) use ( $clave, $orden) {
            $result=  ($orden=="DESC") ? strnatcmp($b->$clave, $a->$clave) :  strnatcmp($a->$clave, $b->$clave);
            return $result;
      };
    }

    public function loadMore()
    {
        $this->perPage += 10;

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function paginate($items, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $this->perPage), $items->count(), $this->perPage, $page, $options);
    // }

    public function render()
    {
        // $paths = $this->paginate($this->paths);
        // $this->totalRecords = count($this->paths);
        // $this->paths = $this->paginate($this->paths);
        // $paths = $this->paginate($this->paths, $this->perPage);
        // dd(count($this->paths));
        $count = count(Photo::all());
        $this->photos = Photo::latest()->paginate($this->perPage);
        $this->emit('photoStore');

        return view('livewire.photo-show', [
            // 'paths' => $this->paths,
            'photos' => $this->photos,
            'count' => $count,
            'loadAmount' => $this->perPage
        ]);
    }

}
