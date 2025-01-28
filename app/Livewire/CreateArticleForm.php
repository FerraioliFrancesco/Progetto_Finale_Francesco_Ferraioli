<?php

namespace App\Livewire;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{

    #[Validate('required', message: "Titolo obbligatorio")]
    #[Validate('min:5', message: "minimo 5 caratteri")]
    public $title;
    #[Validate('required', message: "Descrizione obbligatorio")]
    #[Validate('min:10', message: "minimo 10 caratteri")]
    public $description;
    #[Validate('required', message: "Prezzo obbligatorio")]
    public $price;

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

        $this->reset();
        session()->flash('message', 'Annuncio creato con successo');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
