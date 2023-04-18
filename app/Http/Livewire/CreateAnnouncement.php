<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $is_accepted;
    public $temporary_images;
    public $images = [];
    public $announcement;



    protected $rules =
    [
        'title'=>'required|min:4',
        'body'=> 'required|min:6',
        'price'=> 'required|numeric',
        'category'=> 'required',
        'images.*'=> 'image|max:1024',
        'temporary_images.*'=> 'image|max:1024',

    ];

    protected $messages =[
        'required'=>'Campo Obbligatorio',
        'min'=>'Campo troppo corto',
        'category' => 'Campo obbligatorio',
        'temporary_images.required'=> 'L\'immagine è richiesta',
        'temporary_images.*.image'=> 'I file devono essere immagini',
        'temporary_images.*.max'=> 'L\'immagine dev\'essere massimo 1mb',
        'images.image'=>'I file devono essere immagini',
        'images.max'=> 'L\'immagine dev\'essere massimo 1mb',


    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])){
                foreach ($this->temporary_images as $image){
                    $this->images[]= $image;
                }
            }
        }

        public function removeImage($key)
        {
            if (in_array($key, array_Keys($this->images))){
                unset($this->images[$key]);
            }

        }

        public function store()
        {

            $this->validate();
            $this->announcement = Category::find($this->category)->announcements()->create($this->validate());

            if (count($this->images)){
                foreach ($this->images as $image){
                   // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                    $newFilename = "announcements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path'=>$image->store($newFilename, 'public')]);
                    dispatch(new ResizeImage($newImage->path , 250, 250));
                }

                File::deleteDirectory(storage_path('/app/livewirw-tmp'));
            }


            session()->flash('message', 'Articolo inserito con successo, sara pubblicato dopo la revisione');
            $this->announcement->user()->associate(Auth::user());
            $this->announcement->save();
            $this->cleanForm();

        }

        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);

        }


        public function cleanForm()
        {
            $this->title = '';
            $this->body = '';
            $this->price = '';
            $this->category ='';
            $this->images = [];
            $this->temporary_images = [];


        }


        public function render()
        {
            return view('livewire.create-announcement');
        }
    }
