<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(12);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    // funzione per searchbar della navbar
    public function byCategory(Category $category){
        $articles =$category->articles->where('is_accepted', true);
        return view('article.byCategory',compact('articles','category'));
    }

    public function yourArticles(){
        $articles = Article::orderBY('updated_at','desc')->get();
        return view('article.profile-articles',compact('articles'));
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->user()->disassociate();
        $article->category()->disassociate();
        $article->delete();
        return redirect()->route('profile.articles')->with('message', __('ui.deleteMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $article->setAccepted(null);

        $article->category()->associate($request->category);
        $article->save();

        return redirect(route('profile.articles'))->with('message', __('ui.editMessage'));
    }

}