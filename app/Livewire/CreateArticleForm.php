<?php

namespace App\Livewire;
use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CreateArticleForm extends Component
{
    
    use WithFileUploads;
    
    #[Validate('required', message: "Titolo obbligatorio")]
    #[Validate('min:5', message: "minimo 5 caratteri")]
    public $title;
    #[Validate('required', message: "Descrizione obbligatorio")]
    #[Validate('min:10', message: "minimo 10 caratteri")]
    public $description;
    #[Validate('required', message: "Prezzo obbligatorio")]
    public $price;
    
    public $images=[];
    public $temporary_images;
    
    public $category;
    public $article;
    
    public function save(){
        
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);
        
        if(count($this->images) > 0){
            foreach($this->images as $image){
                $this->article->images()->create([
                    'path' => $image->store('images', 'public')
                ]);
            }
        }
        
        $this->reset();
        session()->flash('message', 'Annuncio creato con successo, in attesa di approvazione');
    }
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images' => 'max:6',
            'temporary_images.*' => 'image|max:1024'
            ])) {
                foreach($this->temporary_images as $image){
                    $this->images[] = $image;
                }   
            }
        }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
        
        public function render()
        {
            return view('livewire.create-article-form');
        }
    }
    