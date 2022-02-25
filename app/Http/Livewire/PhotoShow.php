<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as Coll;

class PhotoShow extends Component
{
    /**
     * variable that stores all the photos
     *
     * @var [type]
     */
    protected $photos;

    /**
     * Used this variable if you want to retrieve from the fyleSystem
     *
     * @var array
     */
    protected $paths = [];

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    // public $classes;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    // public $totalRecords;

    /**
     * Variable to initialize the paginator
     *
     * @var integer
     */
    public $perPage = 10;

    /**
     * listener to load more photos
     *
     * @var array
     */
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    /**
     * Get all the photos from the DB
     *
     * @return void
     */
    public function mount(){

        $this->photos = Photo::all();

    }

    /**
     * Sorts by $clave, order by $order
     *
     * @param [type] $clave
     * @param [type] $orden
     * @return void
     */
    // public function sortBy( $clave, $orden = null ){
    //     return function ($a, $b) use ( $clave, $orden) {
    //         $result=  ($orden=="DESC") ? strnatcmp($b->$clave, $a->$clave) :  strnatcmp($a->$clave, $b->$clave);
    //         return $result;
    //   };
    // }

    /**
     * Adds new 10 photos to the view
     *
     * @return void
     */
    public function loadMore()
    {
        $this->perPage += 10;

    }

    /**
     * Renders the views sending the count of total photos, the photos and the amount to be loaded in the nex request
     *
     * @return void
     */
    public function render()
    {
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
