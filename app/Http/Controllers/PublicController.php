<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at' , 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function searchArticle(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(12);
        return view('article.searched', ['articles'=>$articles, 'query'=>$query]);
    }
}
