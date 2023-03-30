<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $image;
    public $category;

    protected $rules =
    [
        'title'=>'required|min:4',
        'body'=> 'required|min:6',
        'category'=> 'required',
        'price'=> 'required|numeric',
    ];

    protected $messages =[
        'required'=>'Campo Obbligatorio',
        'min'=>'Campo troppo corto',

    ];

    
    public function store()
    {
        $category = Category::find($this->category);

       $announcement = $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,

       ]);

        Auth::user()->announcements()->save($announcement);

        session()->flash('message',' Annuncio caricato con successo');
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function saveAnnouncement()
    {

    }

    public function cleanForm()
    {
       $this->title = '';
       $this->body = '';
       $this->price = '';
       $this->category ='';
    }


    public function render()
    {
        return view('livewire.create-announcement');
    }
}
